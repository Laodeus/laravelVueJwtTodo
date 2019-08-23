<template>
  <div class="container">
    <div id="login">
      <h1>Login:</h1>
      <form @submit.prevent="login">
        <input type="text" v-model="post.email" placeholder="email" />
        <br />
        <input type="password" v-model="post.password" placeholder="password" />
        <br />
        <input type="submit" alt="envoyer" />
        <div id="loginErrorMessage"></div>
      </form>
    </div>
    <br />
    <hr>
    <br />
    <div id="inscription">
      <h1>Inscription:</h1>
      <form @submit.prevent="inscription">
        
        <input type="text" v-model="post.name" placeholder="name" />
        <br />
        <input type="text" v-model="post.email" placeholder="email" />
        <br />
        <input type="password" v-model="post.password" placeholder="password" />
        <br />
        <input type="password" v-model="post.password_confirmation" placeholder="confirmation" />
        <br />
        <input type="submit" alt="envoyer" />
        <div id="InscriptionerrorMessage"></div>
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
      let uri = "/api/auth/login";
      this.axios.post(uri, this.post).then(response => {
        console.log(response.headers.authorization);
        localStorage.setItem('accessToken', response.headers.authorization);
        localStorage.setItem('id', JSON.parse(response.headers.userinfo)[0].id);
        this.$router.push({ name: "home" }).catch(error => {
          console.log("shit happen");
        });//
      }).catch(error=>{
        document.querySelector("#loginErrorMessage").innerHTML ="Connexion Error."; 
      });
    },
    async inscription(){
      let uri = "/api/auth/register";
      this.axios.post(uri, this.post).then(response => {
        document.querySelector("#inscription").innerHTML = "Inscription reussie<br /><br /> Vous pouvez vous connecter.";
        console.log(response);
      })
      .catch(error=>{
        document.querySelector("#InscriptionerrorMessage").innerHTML ="Inscription échouée"; 
      });
    }
  }
};
</script>





