<style scoped>
	.slug-widget {
		display: flex;
		justify-content: flex-start;
		text-align: center;
	}

	.wrapper {
		margin-left: 15px;
	}

	.slug {
		background-color: #fdfd96;
		padding: 3px 5px;
	}

	.url-wrapper {
		display: flex;
		align-items: center;
		height: 28px;
	}

	.input {
		width: auto;
	}
</style>

<template>
	<div class="slug-widget">
		<div class="icon-wrapper wrapper">
			<i class="fa fa-link"></i>
		</div>

		<div class="url-wrapper wrapper">
			<span class="root-url">{{ url }}</span>
			<span class="root-subdirectory">/{{ sub_directory }}</span>
			<span class="slug" v-show="slug && !isEditting">/{{ slug }}</span>
			<input type="text" name="slug" v-show="isEditting" v-model="customSlug" class="input is-small">
		</div>

		<div class="button-wrapper wrapper">
			<button class="save-slug-button button is-small" v-show="!isEditting" @click.prevent="editSlug">Edit</button>
			<button class="save-slug-button button is-small" v-show="isEditting" @click.prevent="saveSlug">Save</button>
			<button class="save-slug-button button is-small" v-show="isEditting" @click.prevent="restSlug">Reset</button>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			url: {
				type: String,
				required: true
			},
			sub_directory: {
				type: String,
				required: true
			},
			title: {
				type: String,
				required: true
			}
		},
		data: function() {
			return {
				slug: this.convertTitle(),
				isEditting: false,
				customSlug: '',
				wasEditting: false
			}

		},
		methods: {
			convertTitle: function() {
				return Slug(this.title);
			},
			editSlug: function() {
				this.customSlug = this.slug;
				this.$emit('edit', this.slug);
				this.isEditting = true;
			},
			saveSlug: function() {
				if(this.customSlug != this.slug) this.wasEditting = true;
				this.slug = Slug(this.customSlug);
				this.$emit('save', this.slug);
				this.isEditting = false;
			},
			restSlug: function() {
				this.slug = this.convertTitle();
				this.$emit('reset', this.slug);
				this.isEditting = false;
				this.wasEditting = false;
			}
		},
		watch: {
			title: _.debounce(function() {
				if(this.wasEditting == false) this.slug = this.convertTitle();
				//run ajax to chcel if slug is unique
				//if not unique, customize slug to be unique
			}, 250),
			slug: function(val) {
				this.$emit('slug-changed', this.slug)
			}
		}
	}
</script>