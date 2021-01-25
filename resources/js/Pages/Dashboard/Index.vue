<template>
  <div>Hello {{ fname }}</div>
</template>
<script>
export default {
  props: ["fname", "lname"],
};
</script>