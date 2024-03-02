<template>
  <h1 class="Title">From user {{ $page.props.auth.user.name }}</h1>
  <div  class="card">
    <div v-if="$page.props.auth.user">
      <div class="Card-title" v-for="detail in details" :key="detail.id">
        <div title="Card title" sub-title="Card subtitle">
          <div>name {{ detail.first_name }} {{ detail.last_name }}</div> <br>
          <div>Goto {{ detail.goto }}</div> <br>
        </div>
      </div>
    </div>
    <div v-else>
      <p>Please log in to view details.</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      details: []
    };
  },
  mounted() {
    this.fetchDetails();
  },
  methods: {
    async fetchDetails() {
      try {
        const response = await axios.get('/api/details');
        const allDetails = response.data;
        const userEmail = this.$page.props.auth.user.email; // Get logged-in user's email
        // Filter details based on user's email
        this.details = allDetails.filter(detail => detail.email === userEmail);
      } catch (error) {
        console.error('Error fetching details:', error);
        alert('Error fetching details. Please try again later.');
      }
    }
  }
};
</script>

<style>
.Title{
  display: grid;
  height: 100%;
  margin: 20px;

  border: solid rgb(255, 0, 0);
  justify-content: center;
}
.card{
  display: grid;
  height: 100%;
  gap: 20px;
  border: solid rgb(255, 0, 0);
  justify-content: center;
}

.Card-title{
  width: 100%;
  margin: 30px;
  border: solid rgb(35, 31, 31);
  text-align: center;
}
</style>