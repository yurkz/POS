<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>Hello {{ fname }}</div>
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
  props: ["fname", "lname"],
};
</script>