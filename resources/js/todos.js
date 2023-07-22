import { reactive, ref } from "vue";
import { router } from '@inertiajs/vue3'
import { base_url } from '@/base_url.js'

export let todos = reactive({

    todo: {
        lists: [],
        todos: [],
        list_id: null
    },

    filters:{
        mine_or_all: 'mine',
        page: 1
    },

    add_list_name: null,
    edit_list_id: null,
    edit_list_name: '',
    add_todo_what_todo: '',
    edit_todo_id: null,
    edit_todo_what_todo: '',

    async getToDoLists() {

        await axios.post(base_url + 'getTodoLists', this.filters).then(todoLists => {
            this.todo.lists = todoLists.data
        })
    },

    async getToDos(todo_list_id) {

        this.todo.todos = []
        // toggle
        if (this.todo.list_id !== todo_list_id) {

            await axios.post(base_url + 'getTodos', {
                todo_list_id: todo_list_id
            } ).then(todos => {
                this.todo.todos = todos.data
            })

            this.todo.list_id = todo_list_id
        }

        else {
            this.todo.list_id = null
        }

    },

    async changeTodoCompleted(n, todo_id, todo_completed) {

        todo_completed = todo_completed === 1 ? 0 : 1

        this.todo.todos[n].completed = todo_completed

        await axios.put(base_url + 'changeTodoCompleted', {
            todo_id: todo_id,
            completed: todo_completed
        })

    },

    async addList() {

        if (this.add_list_name.length < 1 || this.add_list_name.length > 256) return false

        await axios.post(base_url + 'addList', {
            name: this.add_list_name
        })

        this.add_list_name = ''

        this.getToDoLists()

    },

    async editList(list_id, list_name) {

        // toggle
        this.edit_list_id = this.edit_list_id === list_id ? null : list_id

        // edit
        if (this.edit_list_id === list_id) {
            this.edit_list_name = list_name
        }
        // save
        else if (this.edit_list_id !== list_id && this.edit_list_name.length > 0 && this.edit_list_name.length < 256) {

            await axios.put(base_url + 'editList', {
                list_id: list_id,
                list_name: this.edit_list_name
            })

            this.edit_list_name = ''

            this.getToDoLists()
        }

    },

    async deleteList(list_id) {

        if (confirm('Are you sure you want to delete this todo list?') === false) return false

        await axios.delete(base_url + 'deleteList/' + list_id)

        this.todo.list_id = null

        this.getToDoLists()

    },

    async addTodo(list_id) {

        if (this.add_todo_what_todo.length < 1 || this.add_todo_what_todo.length > 96) return false

        await axios.post(base_url + 'addTodo', {
            list_id: list_id,
            what_todo: this.add_todo_what_todo
        })

        this.add_todo_what_todo = ''

        this.todo.list_id = null

        this.getToDos(list_id)

    },

    async editTodo(n, todo_id) {

        // toggle
        this.edit_todo_id = this.edit_todo_id === todo_id ? null : todo_id

        // edit
        if (this.edit_todo_id === todo_id) {
            this.edit_todo_what_todo = this.todo.todos[n].what_todo
        }
        // save
        else {
            this.todo.todos[n].what_todo = this.edit_todo_what_todo
            this.edit_todo_what_todo = ''

            await axios.put(base_url + 'editTodo', {
                todo_id: todo_id,
                what_todo: this.todo.todos[n].what_todo
            })

            this.edit_todo_id = null
        }
        

    },

    async deleteTodo(n, todo_id) {

        if (confirm('Are you sure you want to delete this todo?') === false) return false

        await axios.delete(base_url + 'deleteTodo/' + todo_id)

        this.todo.todos.splice(n, 1)

    }



})