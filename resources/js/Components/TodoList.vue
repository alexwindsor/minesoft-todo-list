<script setup>

    import { todos } from '@/todos.js'

    const props = defineProps({
            list: Object,
            user: Object
        })


</script>

<template>


    <div class="border border-blue-800 rounded p-2 m-1">

        <div v-if="todos.edit_list_id !== list.id" @click="todos.getToDos(list.id)" class="text-2xl">
            {{ list.name }} 
        </div>

        <div v-if="todos.edit_list_id === list.id">
            <input 
                type="text" 
                maxlength="256"
                v-model="todos.edit_list_name" 
                class="border border-black rounded p-1 w-1/3"
            />
        </div>

        <button 
            v-if="todos.todo.list_id === list.id"
            class="border-2 border-black rounded p-1 text-white m-2" 
            :class="{'bg-green-500': todos.edit_list_id === list.id,
                    'bg-blue-500': todos.edit_list_id !== list.id
                    }"
            @click="todos.editList(list.id, list.name)"
            >
            {{ todos.edit_list_id === list.id ? 'SAVE' : 'EDIT' }}
        </button>

        <div class="text-sm">{{ list.user.name }}</div>

        <div v-if="todos.todo.list_id === list.id" class="ml-5 mt-2">

            <div v-if="todos.todo.todos.length === 0">This todo list is empty</div>

            <div v-else v-for="n in todos.todo.todos.length" class="grid grid-cols-12">
                <div class="col-span-6" :class="{'text-gray-500': todos.todo.todos[n-1].completed === 1}">
                    <span v-if="todos.edit_todo_id !== todos.todo.todos[n-1].id">{{ todos.todo.todos[n-1].what_todo }}</span>
                    <input 
                        type="text" 
                        maxlength="96"
                        v-if="todos.edit_todo_id === todos.todo.todos[n-1].id" 
                        v-model="todos.edit_todo_what_todo" 
                        class="border border-black rounded p-1 w-11/12"
                    />
                </div>

                <div class="col-span-1">
                    <label>
                        completed? 
                        <input 
                            type="checkbox" 
                            :checked="todos.todo.todos[n-1].completed === 1" 
                            @click="todos.changeTodoCompleted(n-1, todos.todo.todos[n-1].id, todos.todo.todos[n-1].completed)"
                            :disabled="list.user.id !== props.user.id"
                        >
                    </label>
                </div>

                <div v-if="list.user.id === props.user.id" class="col-span-1">
                    <button 
                        class="border-2 border-black rounded p-1 text-white" 
                        :class="{'bg-green-500': todos.edit_todo_id === todos.todo.todos[n-1].id,
                                'bg-blue-500': todos.edit_todo_id !== todos.todo.todos[n-1].id
                                }"
                        @click="todos.editTodo(n-1, todos.todo.todos[n-1].id)"
                        >
                        {{ todos.edit_todo_id === todos.todo.todos[n-1].id ? 'SAVE' : 'EDIT' }}
                    </button>
                </div>

                <div v-if="list.user.id === props.user.id" class="col-span-1 m-1">
                    <button 
                        class="border-2 border-black rounded bg-red-500 p-1 text-white" 
                        @click="todos.deleteTodo(n-1, todos.todo.todos[n-1].id)"
                        >DELETE</button>
                </div>

            </div>

            <div v-if="list.user.id === props.user.id">
                <input type="text" maxlength="96" class="border border-black rounded p-1 w-1/3" v-model="todos.add_todo_what_todo">
                <button class="border-2 border-black rounded p-1 text-white bg-green-500 m-2" @click="todos.addTodo(list.id)">ADD A NEW TODO</button>

                <br><br>

                <button class="border-2 border-black rounded p-1 text-white bg-red-500 m-2" @click="todos.deleteList(list.id)">DELETE ENTIRE LIST</button>

            </div>



        </div>

    </div>



</template>