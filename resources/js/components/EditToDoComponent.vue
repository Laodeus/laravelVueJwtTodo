<template>
  <div>
    <form @submit.prevent="updateTodo">
      <router-link :to="{name:'createtask'}" class="btn btn-primary">+</router-link>
      <input type="text" v-model="ToDo.title" />
      <button class="btn btn-primary">Update</button>
    </form>
    <div v-for="task in tasks" :key="task.id">
      <div>
        <label>Titre:</label>
        <input type="text" v-model="task.title" />
        <br />
        <label>Status:</label>
        <input type="text" v-model="task.status" />
        <br />
        <button class="btn btn-primary" @click.prevent="editTask(task.id)">Edit</button>
        <button class="btn btn-danger" @click.prevent="deleteTask(task.id)">Delete</button>
      </div>
    </div>
  </div>
</template>
<script>
import { constants } from "crypto";
export default {
  data() {
    return {
      ToDo: { idUsername: 0 },
      tasks: []
    };
  },
  created() {
    let uri = `/api/todo/edit/${this.$route.params.id}`;
    this.axios.get(uri).then(response => {
      this.ToDo = response.data;
    });
    uri = `/api/tasks/${this.$route.params.id}`; //insert here the id user from the local storage;
    this.axios.get(uri).then(response => {
      this.tasks = response.data.data;
    });
  },
  methods: {
    updateTodo() {
      let uri = `/api/todo/update/${this.$route.params.id}`;
      this.axios.post(uri, this.ToDo).then(response => {
        this.$router.push({ name: "todoList" });
        console.log(response);
      });
    },
    editTask(id) {
      let uri = `/api/task/update/${id}`;
      for (let i = 0; i < this.tasks.length; i++) {
        console.log(`${this.tasks[i].id} === ${id}`);
        if (this.tasks[i].id === id) {
          this.axios.post(uri, this.tasks[i]).then(response => {
            console.log("POUF POUF");
          });
        }
      }
    },
    deleteTask(id) {
      let uri = `/api/task/delete/${id}`;
      this.axios.delete(uri).then(response => {
        //suppresion du todo dans l'affiache ACTUEL (sans recharger)
        for (let i = 0; i < this.tasks.length; i++) {
          if (this.tasks[i].id == id) {
            this.tasks.splice(i, 1);
          }
        }
      });
    }
  }
};
</script>