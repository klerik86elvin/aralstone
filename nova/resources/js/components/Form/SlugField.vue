<template>
  <default-field :field="field" :errors="errors" :show-help-text="showHelpText">
    <template slot="field">
      <input
        ref="theInput"
        class="w-full form-control form-input form-input-bordered"
        :id="field.attribute"
        :dusk="field.attribute"
        v-model="value"
        :disabled="isReadonly"
        v-bind="extraAttributes"
      />

      <button
        class="btn btn-link rounded px-1 py-1 text-sm text-primary mt-2"
        v-if="field.showCustomizeButton"
        type="button"
        @click="toggleCustomizeClick"
      >
        Customize
      </button>
    </template>
  </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import slugify from '@/util/slugify'

export default {
  mixins: [HandlesValidationErrors, FormField],

  mounted() {
    if (!this.field.readonly) {
      this.registerChangeListener()
    }
  },

  methods: {
    changeListener(value) {
      return value => {
        this.value = slugify(value, this.field.separator)
      }
    },

    registerChangeListener() {
      Nova.$on('title-change', value => {
        this.value = slugify(value, this.field.separator)
      })
    },

    toggleCustomizeClick() {
      if (this.field.readonly) {
        Nova.$off('title-change')
        this.field.readonly = false
        this.field.extraAttributes.readonly = false
        this.field.showCustomizeButton = false
        this.$refs.theInput.focus()
        return
      }

      Nova.$on('title-change', value => {
        this.value = slugify(value, this.field.separator)
      })
      this.field.readonly = true
      this.field.extraAttributes.readonly = true
    },
  },

  computed: {
    extraAttributes() {
      return this.field.extraAttributes
    },
  },
}
</script>
