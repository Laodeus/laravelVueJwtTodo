<template>
  <div>
    <form @submit.prevent="updateTodo">
      <input type="text" v-model="ToDo.title" />
      <button class="btn btn-primary">Update</button>
    </form>
  </div>
</template>
<script>
import { constants } from "crypto";
export default {
  data() {
    return {
      ToDo: { idUsername: 0 }
    };
  },
  created() {
    let uri = `/api/todo/edit/${this.$route.params.id}`;
    this.axios.get(uri).then(response => {
      this.ToDo = response.data;
    });
  },
  methods: {
    updateTodo() {
      let uri = `/api/todo/update/${this.$route.params.id}`;
      this.axios.post(uri, this.ToDo).then(response => {
        this.$router.push({ name: "todoList" });
        console.log(response);
      });
    }
  }
};
</script>