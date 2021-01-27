<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Leads</h1>
        </div>
        <div class="col-md-6">
          <div class="row justify-content-end">
            <inertia-link class="btn btn-success" :href="$route('lead.add')"
              >Add New</inertia-link
            >
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered bg-white">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>DOB</th>
              <th>Package</th>
              <th>Added On</th>
              <th></th>
            </tr>

            <tr v-for="lead in leads" :key="lead.id">
              <td>{{ lead.id }}</td>
              <td>{{ lead.name }}</td>
              <td>{{ lead.email }}</td>
              <td>{{ lead.phone }}</td>
              <td>{{ lead.dob }}</td>
              <td>{{ lead.interested_package }}</td>
              <td>{{ lead.created_at }}</td>
              <td>
                <inertia-link :href="$route('lead.view', { lead: lead })"
                  >></inertia-link
                >
              </td>
            </tr>
          </table>
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
  props: ["leads"],
};
</script>