<template>
    <div class="addTodo">
        <input type="text" name="name" v-model="todo.name" placeholder="Todo name here" id="">
        <font-awesome-icon @click="addTodo()" icon="plus-square" :class="[todo.name ? 'active':'inactive', 'plus']" />
    </div>
</template>

<script>

export default{
    data: function() {
        return {
            todo: {
                name: ""
            }
        }
    },
    methods: {
        addTodo() {
            if(this.todo.name == '')
                return;
            axios.post('api/todo/store', {
                name: this.todo.name
            }) 
            .then(response => {
                if(response.status == 201) {
                    this.todo.name = "";
                    this.$emit('todocreated')
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
<style scoped>
    .addTodo {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input {
        background: #f7f7ff;
        outline: none;
        border: 1px solid #8b3535;
        margin: 0 10px;
        padding: 10px;
    }
    
    .active {
        color: #00CE25;
        transition: all .2s ease-in-out;
        cursor: pointer;
    }

    .inactive {
        color: #747474;
        transition: all .2s ease-in-out;
    }

    .plus {
        font-size: 40px;
    }
</style>