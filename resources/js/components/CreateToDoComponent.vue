<template>
  <div class="container">
    <form @submit.prevent="create">
      <h1>TO DO:</h1>
      <br />
      <label>Titre:</label>
      <br />
      <input type="text" alt="title" v-model="ToDo.title" />
      <input type="submit" alt="envoyer" />
    </form>
  </div>
</template>
<script>
import { log } from "util";
export default {
  data() {
    return {
      ToDo: { idUsername: localStorage.getItem("id") } //Inset here the user id from the local storage
    };
  },
  methods: {
    create() {
      let uri = "api/todo/store";
      this.axios
        .post(uri, this.ToDo)
        .then(response => {
          //sucess
          this.$router.push({ name: "home" });
        })
        .catch(error => {
          console.log("Fuck it");
        });
    }
  }
};
</script>