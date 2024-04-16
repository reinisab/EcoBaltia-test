<template>
    <div>

        <div v-if="response">

            <h3>Most popular books this month</h3>

            <table class="table caption-top">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Popularity</th>
                    <th scope="col">Buy now</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="book in response.data" :key="book.id">
                    <td>{{ book.name }}</td>
                    <td>{{ book.publisher_name }}</td>
                    <td>{{ book.authors.join(', ') }}</td>
                    <td>{{ book.purchase_count }}</td>
                    <td><button class="btn btn-secondary" @click="purchaseBook(book.id)">Buy now</button></td>
                </tr>

                </tbody>
            </table>



        </div>

        <form @submit.prevent="search">
            <input type="hidden" name="_token" :value="csrf">
            <div class="mb-3">
                <label for="booksearch" class="form-label">Search</label>
                <input type="text" v-model="query" class="form-control" id="booksearch" name="query" placeholder="Enter book name or author">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <a href="/api/top10" target="_blank">Access TOP 10 books API endpoint</a>


    </div>
</template>

<script setup>
    import axios from "axios";
    import { ref, onMounted } from "vue";

    const response = ref();
    const query = ref('');
    const csrf = "{{ csrf_token() }}";

    const getBookList = async () => {
        try {
            response.value = await axios.get("/api/test-me");
        } catch (error) {
            console.error(error);
        }
    };

    const search = async () => {
        try {
            const url = `/api/search?query=${query.value}`;
            response.value = await axios.get(url);
        } catch (error) {
            console.error(error);
        }
    };

    const purchaseBook = async (bookId) => {
        try {
            await axios.post(`/api/books/purchase/${bookId}`);
            // Update the purchase count locally
            const bookToUpdate = response.value.data.find(book => book.id === bookId);
            if (bookToUpdate) {
                bookToUpdate.purchase_count++;
            }
            await search();
        } catch (error) {
            console.error(error);
        }
    };

    onMounted(getBookList);
</script>
