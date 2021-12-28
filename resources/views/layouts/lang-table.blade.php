<style >
    .lang_dropdown{
        position: relative;
        width: 50px;
        height: 36px;

        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 5;
        margin-left: 0;
    }

    .lang_list {
        position: absolute;
        background-color: #fff;
        width: 100%;
        border-radius: 17px;
        border: 1px solid #fff;
        top: 40px;
        z-index: 5;
        display: none;
    }

    .lang_list a{
        color: #000;
        text-transform: uppercase;
        padding: 0 10px;
    }

    .lang_list a:hover{
        text-decoration: underline;
    }

    .lang_list li{
        margin: 10px 0;
    }

    .lang_list li:nth-child(2){
        margin-top: 0;
    }

    .active_lang {
        font-weight: 400;
        color: #fff;
        font-size: 14px;
        position: relative;
        display: flex;
        align-items: center;
        cursor: pointer;
        width: 100%;
        border-radius: 17px;
        border: 1px solid #fff;
        height: 100%;
        flex: none;
        justify-content: center;
    }

    .active_lang.active{
        background-color: #fff;
        color: #000;
    }


    @media(max-width: 768px){
        .call-center{
            margin-right: 20px;
        }
    }
</style>
<div class="lang_dropdown">
    <span class="active_lang">{{strtoupper(app()->getLocale())}}</span>
    <ul class="lang_list">
        @foreach(config('app.locales') as $locale)
            @if($locale != app()->getLocale())
                <li>
                    <a href="/lang/{{$locale}}">{{strtoupper($locale)}}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div>

<script>
    $('.active_lang').click(function(e){
        $(this).next('.lang_list').fadeToggle();

        $(this).toggleClass('active')
    });
    $(document).click(function(){
        $('.lang_list').fadeOut();
        $('.active_lang').removeClass('active')
    });

    $('.active_lang').click(function(e){
        e.stopPropagation();
    });
    $('.lang_list').click(function(e){
        e.stopPropagation();
    });
</script>