<template>
    <div>
        <button @click="importListing">Импортировать пользователей</button>
        <div>
            <p>Всего: {{ total }}</p>
            <p>Добавлено: {{ added }}</p>
            <p>Обновлено: {{ updated }}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            total: 0,
            added: 0,
            updated: 0,
        };
    },
    methods: {
        importListing() {
            axios.post('/api/import-list')
                .then((response) => {
                    this.total = response.data.total;
                    this.added = response.data.added;
                    this.updated = response.data.updated;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
