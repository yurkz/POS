<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <inertia-link :href="$route('lead.list')">Leads</inertia-link>
            <span class="breadcrumb-sep">/</span>

            <inertia-link :href="$route('lead.view', { lead: lead })">
              Lead Details</inertia-link
            >
            <span class="breadcrumb-sep">/</span>
            Add Reminder
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Add reminder</div>
            <div class="card-body">
              <form @submit.prevent="handleSubmit">
                <div class="form-group">
                  <label for="reminder">Reminder</label>
                  <textarea
                    name="reminder"
                    id="reminder"
                    class="form-control"
                    v-model="reminder.reminder"
                  ></textarea>
                </div>
                <div class="form-group">
                  <label for="date">Reminder Date</label>
                  <input
                    type="date"
                    name="date"
                    id="date"
                    class="form-control"
                    v-model="reminder.reminder_date"
                  />
                </div>
                <button class="btn btn-success">Save</button>
              </form>
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
  components: { Layout },
  props: {
    lead: Object,
  },
  data() {
    return {
      reminder: {
        reminder: "",
        reminder_date: "",
      },
    };
  },
  methods: {
    handleSubmit() {
      const postData = {
        reminder: this.reminder.reminder,
        reminder_date: this.reminder.reminder_date,
        lead_id: this.lead.id,
      };
      console.log(postData);
      this.$inertia.post(route("reminder.save"), postData);
    },
  },
};
</script>