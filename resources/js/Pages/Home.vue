<script setup>
    import { Head } from '@inertiajs/vue3'
    import { reactive, onMounted } from 'vue'
    import { todos } from '@/todos.js'
    import Layout from '@/Pages/Layout.vue'
    import TodoList from '@/Components/TodoList.vue'
    import Pagination from '@/Components/Pagination.vue'

    const props = defineProps({
        user: Object,
        page: Number,
        mine_or_all: String,
    })


    onMounted(() => {
        todos.filters.mine_or_all = props.mine_or_all
        todos.filters.page = props.page
        todos.getToDoLists()
    })



</script>

<template>

    <Head title="HOME | MineSoft To Do Lists" />

    <Layout page="" :user="user">

        Hello <span v-if="user" class="font-bold">{{ user.name }}</span>.

        Show <label>mine <input type="radio" name="mine_or_all" value="mine" v-model="todos.filters.mine_or_all" @change="todos.getToDoLists"></label> or <label>all <input type="radio" name="mine_or_all" value="all" v-model="todos.filters.mine_or_all" @change="todos.getToDoLists"></label> to do lists?

        <br><br>

        <input type="text" maxlength="96" class="border border-black rounded p-1 w-1/3" v-model="todos.add_list_name">
        <button class="border-2 border-black rounded p-1 text-white bg-green-500 m-2" @click="todos.addList">
            ADD A NEW LIST
        </button>

        <br><br>

        <TodoList v-for="list in todos.todo.lists.data" :list="list" :user="user" />

        <Pagination v-if=" todos.todo.lists.total > 10" :links=" todos.todo.lists.links" :filters="todos.filters" />

    </Layout>

</template>