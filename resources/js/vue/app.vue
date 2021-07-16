<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">
                Todo List
            </h2>
            <add-todo-form v-on:todocreated="getList()"/>
        </div>
        <list-view v-on:reloadlist="getList()" :todos="todos" />
    </div>
</template>

<script>
import addTodoForm from "./addTodoForm.vue";
import listView from "./listView.vue";
export default{
    components: {
        addTodoForm,
        listView
    }, 
    data: function() {
        return {
            todos: []
        }
    },
    methods: {
        getList(){
            axios.get('api/todos')
            .then(response => {
                this.todos = response.data
            })
            .catch(error => {
                console.log(error)
            })
        }
    },
    created() {
        this.getList();
    }
}
</script>
<style scoped>
    .todoListContainer {
        font-family: sans-serif;
        width: 350px;
        margin: auto;
    }

    .heading {
        background: #E6E6E6;
        padding: 10px;
    }

    #title {
        text-align: center;

    }
</style>
