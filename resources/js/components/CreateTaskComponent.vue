<template>
  <div class="container">
    <form @submit.prevent="create">
      <h1>Task:</h1>
      <br />
      <label>Titre:</label>
      <br />
      <input type="text" alt="title" v-model="Task.title" />
      <br />
      <label>Statut:</label>
      <input type="text" alt="status" v-model="Task.status" />
      <input type="submit" alt="envoyer" />
    </form>
  </div>
</template>
<script>
import { log } from "util";
export default {
  data() {
    return {
      Task: { idTodo: this.$route.params.id } //this.$route.params.id
    };
  },
  methods: {
    create() {
      let uri = "../api/task/store";
      this.axios
        .post(uri, this.Task)
        .then(response => {
          //sucess
          this.$router.push({ name: "home" });
        })
        .catch(error => {
          console.log("POURQUééééé?!");
        });
    }
  }
};
</script>