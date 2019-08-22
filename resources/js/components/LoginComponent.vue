<template>
  <div class="container">
    <div id="login">
      <h1>Login:</h1>
      <form @submit.prevent="login">
        <label>Username:</label>
        <input type="text" alt="username" />
        <br />
        <label>Password:</label>
        <input type="password" alt="password" />
        <br />
        <input type="submit" alt="envoyer" />
      </form>
    </div>

    <div id="s'inscrire">
      <h1>Login:</h1>
      <form @submit.prevent="inscription">
        <label>Username:</label>
        <input type="text" alt="username" />
        <br />
        <label>Password:</label>
        <input type="password" alt="password" />
        <br />
        <label>Password:</label>
        <input type="password" alt="password" />
        <br />
        <input type="submit" alt="envoyer" />
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: {}
    };
  },
  methods: {
    login() {
      let uri = "/api/post/create";
      this.axios.post(uri, this.post).then(response => {
        this.$router.push({ name: "posts" }).catch(error => {
          console.log("shit happen");
        });
      });
    },
    inscription() {
      let uri = "/api/post/create";
      this.axios.post(uri, this.post).then(response => {
        this.$router.push({ name: "posts" }).catch(error => {
          console.log("shit happen");
        });
      });
    }
  }
};
</script>





