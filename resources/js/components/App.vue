<template>
    <div
        v-if="article !== null"
        class="alert alert-primary alert-dismissible fade show"
        role="alert"
    >
        Добавлена новая статья:
        <strong>
            <a :href="`/articles/${article.id}`">
                {{ article.name }}
            </a>
        </strong>

        <button
            type="button"
            class="btn-close"
            @click="article = null"
            aria-label="Закрыть"
        ></button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            article: null
        };
    },

    mounted() {
        window.Echo.channel('test')
            .listen('.NewArticleEvent', (event) => {
                console.log('Получено уведомление:', event);

                this.article = event.article;
            });
    },

    beforeUnmount() {
        window.Echo.leave('test');
    }
};
</script>
