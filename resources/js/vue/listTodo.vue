<template>
    <div>
        <span :class="[todo.completed ? 'completed': '']">
            {{todo.name}}
        </span>
        <span>
            <input type="checkbox" @change="changeStatus()" v-model="todo.completed" id="">
            <font-awesome-icon 
            icon="trash" @click="destroy()" class="trash"
            />
        </span>
    </div>
</template>

<script>

export default{
    props: ['todo'],
    methods: {
        changeStatus() {
            axios.put('/todolist/public/api/todo/'+this.todo.id, {
                completed: this.todo.completed
            })
            .then(response => {
                if(response.status==200)
                    this.$emit("todochanged")
            })
            .catch(error => {
                console.log(error);
            })
        },
        destroy() {
            axios.delete('/todolist/public/api/todo/'+this.todo.id)
            .then(response => {
                if(response.status==200)
                    this.$emit("todochanged")
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
<style scoped>
    .completed {
        text-decoration: line-through;
        color: gray;
    }

    .trash {
        color: red;
        cursor: pointer;
    }
</style>
