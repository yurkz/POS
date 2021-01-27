<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="$route('lead.list')">Leads</inertia-link>
            <span class="breadcrumb-sep">/</span>
            Lead Details
          </h1>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Lead Details</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
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
                        <button class="btn btn-success">Update</button>
                        <inertia-link
                          class="btn btn-warning"
                          :href="$route('lead.list')"
                          >Back</inertia-link
                        >
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card" v-if="lead.reminders.length > 0">
            <div class="card-header">Lead reminders</div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li
                  class="list-group-item list-group-item-action"
                  v-for="reminder in lead.reminders"
                  :key="reminder.id"
                >
                  <div class="row">
                    <div class="col-md-6">
                      {{ reminder.reminder }}
                    </div>
                    <div class="col-md-2">
                      {{ reminder.reminder_date }}
                    </div>
                    <div class="col-md-2">
                      <strong> {{ reminder.status }}</strong>
                    </div>
                    <div class="col-md-2">
                      <inertia-link href="#" class="float-right"
                        >></inertia-link
                      >
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="card" v-else>
            <div class="card-header">Lead reminders</div>
            <div class="card-body">
              <inertia-link
                :href="$route('reminder.add', { lead: lead })"
                class="btn btn-success"
                >Add new Reminder</inertia-link
              >
            </div>
          </div>
        </div>
      </div>
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
  props: {
    leadProp: Object,
  },
  created() {
    this.lead = this.leadProp;
  },
  methods: {
    async handleSubmit() {
      let res = await this.$inertia.post("/leads/update", this.lead);
      console.log("update button");
    },
  },
};
</script>