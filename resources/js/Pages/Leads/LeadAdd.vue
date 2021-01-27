<template>
  <layout>
    <div class="container">
      <form @submit.prevent="handleSubmit">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                class="form-control"
                v-model="lead.name"
                id="name"
                tabindex="1"
              />
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input
                type="text"
                class="form-control"
                v-model="lead.phone"
                id="phone"
                tabindex="3"
              />
            </div>
            <div class="form-group">
              <label for="package">Interested package</label>
              <input
                type="text"
                class="form-control"
                v-model="lead.interested_package"
                id="package"
                tabindex="5"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email address</label>
              <input
                type="text"
                class="form-control"
                v-model="lead.email"
                id="email"
                tabindex="2"
              />
            </div>
            <div class="form-group">
              <label for="dob">Birthday</label>
              <input
                type="date"
                class="form-control"
                v-model="lead.dob"
                id="dob"
                tabindex="4"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-success">Save</button>
            <inertia-link class="btn btn-warning" :href="$route('lead.list')"
              >Back</inertia-link
            >
          </div>
        </div>
      </form>
    </div>
  </layout>
</template>
<script>
import Layout from "../../Shared/Layout";
export default {
  components: {
    Layout,
  },
  data() {
    return {
      lead: {
        name: "",
        email: "",
        phone: "",
        dob: "",
        interested_package: "",
      },
    };
  },
  methods: {
    async handleSubmit() {
      let res = await this.$inertia.post("/leads/save", this.lead);
    },
  },
};
</script>