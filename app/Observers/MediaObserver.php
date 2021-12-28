<?php


namespace App\Observers;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Application;
use Intervention\Image\Facades\Image;
use Spatie\MediaLibrary\Conversions\FileManipulator;
use Spatie\MediaLibrary\MediaCollections\Filesystem;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaObserver extends \Spatie\MediaLibrary\MediaCollections\Models\Observers\MediaObserver
{
    public function creating(Media $media)
    {
        if ($media->shouldSortWhenCreating()) {
            if (is_null($media->order_column)) {
                $media->setHighestOrderNumber();
            }
        }

    }

    public function updating(Media $media)
    {
        /** @var \Spatie\MediaLibrary\MediaCollections\Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        if (config('media-library.moves_media_on_update')) {
            $filesystem->syncMediaPath($media);
        }

        if ($media->file_name !== $media->getOriginal('file_name')) {
            $filesystem->syncFileNames($media);
        }

        if($media->model_type == 'App\Models\Product'):
            $url = explode('/',$media->getFullUrl());

            $img = Image::make(public_path('storage/'.$url[count($url)-2].'/'.$url[count($url)-1]));

            $watermark = Image::make(public_path('storage/marker.png'))->resize(200,50);

            $img->insert($watermark, 'right');
            $img->save(public_path('storage/'.$url[4].'/'.$url[5]));
        endif;
    }

    public function updated(Media $media)
    {
        if (is_null($media->getOriginal('model_id'))) {
            return;
        }

        $original = $media->getOriginal('manipulations');

        if (! $this->isLumen() && ! $this->isLaravel7orHigher()) {
            $original = json_decode($original, true);
        }

        if ($media->manipulations !== $original) {
            $eventDispatcher = Media::getEventDispatcher();
            Media::unsetEventDispatcher();

            /** @var \Spatie\MediaLibrary\Conversions\FileManipulator $fileManipulator */
            $fileManipulator = app(FileManipulator::class);

            $fileManipulator->createDerivedFiles($media);

            Media::setEventDispatcher($eventDispatcher);
        }
    }

    public function deleted(Media $media)
    {
        if (in_array(SoftDeletes::class, class_uses_recursive($media))) {
            if (! $media->isForceDeleting()) {
                return;
            }
        }

        /** @var \Spatie\MediaLibrary\MediaCollections\Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        $filesystem->removeAllFiles($media);
    }

    private function isLaravel7orHigher(): bool
    {
        if (Application::VERSION === '7.x-dev') {
            return true;
        }

        if (version_compare(Application::VERSION, '7.0', '>=')) {
            return true;
        }

        return false;
    }

    protected function isLumen(): bool
    {
        return app() instanceof Lumen;
    }
}