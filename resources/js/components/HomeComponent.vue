<template>
  <div>
    <router-link :to="{name:'createtodo'}" class="btn btn-primary">+</router-link>
    <div v-for="todo in todos" :key="todo.id">
      <div>
        <h2>{{todo.title}}</h2>
        <p>{{todo.id}}</p>
        <router-link :to="{path:'edittodo/'+todo.id}" class="btn btn-primary">Edit</router-link>
        <button class="btn btn-danger" @click.prevent="deleteTodo(todo.id)">Delete</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      todos: []
    };
  },
  created() {
    let uri = "/api/todos/0"; //insert here the id user from the local storage;
    this.axios.get(uri).then(response => {
      this.todos = response.data.data;
    });
  },
  methods: {
    deleteTodo(id) {
      let uri = `/api/todo/delete/${id}`;
      this.axios.delete(uri).then(response => {
        //suppresion du todo dans l'affiache ACTUEL (sans recharger)
        for (let i = 0; i < this.todos.length; i++) {
          if (this.todos[i].id == id) {
            this.todos.splice(i, 1);
          }
        }
      });
    }
  }
};
</script>