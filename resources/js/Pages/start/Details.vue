<template>
  <div class="location-details-container">
    <div class="title"><p>Urban Odyssey!</p></div>
    <div class="input">
      <h2>{{ selectedPlaceName }}</h2>
      <input type="text" v-model="firstName" placeholder="Enter Your First Name" class="ddtinp">
      <input type="text" v-model="lastName" placeholder="Enter Your Last Name" class="ddtinp">
      <label for="cost">Cost</label><br>
      <input type="number" v-model="cost" class="ddtinp" min="1">
      <label for="depDate">Departure Date</label><br>
      <input type="date" v-model="depDate" class="ddtinp">
      <label for="returnDate">Return Date</label><br>
      <input type="date" v-model="returnDate" class="ddtinp">
    </div>
    <div class="details">
      <div v-for="ptype in detailsData">
        <div v-if="ptype === 'hotels'">
        <h2>Hotel Details</h2>
        <ul>
          <li v-for="place in favPlaces" :key="place.location_id">
            {{ place.name }} - {{ place.address }}
          </li>
          <!-- Display other hotel-specific details -->
        </ul>
      </div>
      <div v-else-if="ptype === 'restaurants'">
        <h2>Restaurant Details</h2>
        <ul>
          <li v-for="place in favPlaces" :key="place.location_id">
            {{ place.name }} - {{ place.address }}
          </li>
          <!-- Display other restaurant-specific details -->
        </ul>
      </div>
    </div>
      
      
      
    </div>
    
    <!-- Display other details as needed -->
    <button class="btn" @click="closeModal">Close</button>
    <button @click="submitForm">Proceed</button>
  </div>
</template>

<script>
export default {
  props: ['detailsToDisplay', 'selectedPlaceName', 'detailsData', 'favPlaces'],
  data() {
    return {
      firstName: '',
      lastName: '',
      cost: 0,
      depDate: '', 
      returnDate: '',
    };
  },
  methods: {
    closeModal() {
      this.$emit('close-modal'); 
    },
    async submitForm() {
      try {

        const response = await axios.put('/api/submit-data', {
          first_name: this.firstName,
          last_name: this.lastName,
          cost: this.cost,
          depDate: this.depDate,
          returnDate: this.returnDate,
          favPlaces: this.favPlaces,
          selected_place_name: this.selectedPlaceName,
          detailsData: this.detailsData,
        });
        
        console.log(response);

      } catch (error) {
        console.error('Error submitting data:', error);
      }
    },
  },
};
</script>

<style>
.location-details-container {
  padding: 20px;
  background-image: linear-gradient(to top, #c2b2a6, #37679f);
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 80vh;
  max-width: 700px; /* Adjust the max-width to make it wider */
  margin: 0 auto;
}

.title {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 15px;
}

h2 {
  text-align: center;
  font-size: 20px;
  margin-bottom: 10px;
}

input {
  width: 100%;
  margin-bottom: 10px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.input {
  padding: 20px;
}

.details {
  padding: 20px;
}

label {
  font-size: 14px;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  margin-bottom: 8px;
}

.btn {
  background-image: linear-gradient(to right,#4ed672, #086521);
  color: #fff;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn:hover {
  background-image: linear-gradient(to right,#f1492b, #991d07);
}
</style>