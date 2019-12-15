<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <b-card
          header="Weather Data"
        >
          <b-form>
            <b-form-group id="input-group-1" label="Country:" label-for="input-country">
              <multiselect-component
                id="input-country"
                :options="countries"
                :searchable="true"
                :close-on-select="true"
                v-model="form.country"
                placeholder="Select a Country"
                label="name"
                >
              </multiselect-component>
            </b-form-group>

            <b-form-group id="input-group-2" label="City:" label-for="input-city">
              <b-form-input
                id="input-city"
                v-model="form.city"
                required
                placeholder="Enter City"
              ></b-form-input>
            </b-form-group>

            <b-button
              type="button"
              variant="primary"
              @click="onCheckWeather()"
              class="justify-content-center"
              >
              Check Weather
            </b-button>
          </b-form>
        </b-card>
        <br>
        <div v-if="showError" class="alert alert-danger text-capitalize" role="alert">
          {{ errorMessage }}
        </div>
        <b-card
          v-if="show"
          :header="'Weather Results: ' + weatherData.name + ', ' + country.name"
        >
          <div class="row">
            <div class="col-md-6">
              <b>Latitude: </b> {{ weatherData.coord.lat }}
            </div>
            <div class="col-md-6">
              <b>Longitude: </b> {{ weatherData.coord.lon }}
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center p-3">
              <h5><strong>Weather Information:</strong></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 text-capitalize d-flex justify-content-center">
              {{ weatherData.weather[0].main }}
            </div>
            <div class="col-md-6 text-capitalize d-flex justify-content-center">
              {{ weatherData.weather[0].description }}
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
              <img :src="'http://openweathermap.org/img/wn/' + weatherData.weather[0].icon + '@2x.png'" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center p-3">
              <h5><strong>Main Information:</strong></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <b>Temperature (Celsius): </b> {{ weatherData.main.temp }}
            </div>
            <div class="col-md-6">
              <b>Feels Like (Celsius): </b> {{ weatherData.main.feels_like }}
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <b>Min Temperature (Celsius): </b> {{ weatherData.main.temp_min }}
            </div>
            <div class="col-md-6">
              <b>Max Temperature (Celsius): </b> {{ weatherData.main.temp_max }}
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <b>Pressure (hPa): </b> {{ weatherData.main.pressure }}
            </div>
            <div class="col-md-6">
              <b>Humidity (%): </b> {{ weatherData.main.humidity }}
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center p-3">
              <h5><strong>Wind Information:</strong></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <b>Speed (meter/sec): </b> {{ weatherData.wind.speed }}
            </div>
            <div class="col-md-6">
              <b>Degrees (meteorological): </b> {{ weatherData.wind.deg }}
            </div>
          </div>
        </b-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      countries: [],
      city: null,
      country: null,
      show: false,
      form: {},
      weatherData: {},
      showError: false,
      errorMessage: null
    }
  },
  mounted() {
    axios.get('/api/countries', { validateStatus: false })
      .subscribe(response => {
        if (response.statusText == 'OK') {
          this.countries = response.data;
        }
      });
  },
  methods: {
    onCheckWeather() {
      this.city = this.form.city;
      this.country = this.form.country;
      const data = {
        city: this.city,
        countryCode: this.country.alpha2Code
      };
      axios.post('/api/weather', data, { validateStatus: false })
        .subscribe(response => {
          if (response.statusText == 'OK') {
            this.show = true;
            this.weatherData = response.data;
          } else {
            this.show = false;
            this.errorMessage = response.data.message; 
          }
          this.showError = !this.show;
        });
    }
  }
};
</script>
