<template>
  <h1>New reminder</h1>
  <input type="text" v-model="reminder.data" />
  <input type="date" v-model="reminder.due_date" />

  <button @click="addData">Add Reminder</button>
  <h1>Reminders</h1>

  <ul>
    <li v-for="reminder in reminders" :key="reminder.id">{{ reminder.data }} - {{ reminder.due_date }}</li>
  </ul>
</template>

<script lang="ts" setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const reminders = ref<
  {
    id: number;
    data: string;
    due_date: string;
  }[]
>();
const reminder = ref({
  data: '',
  due_date: '',
});

onMounted(() => {
  getData();
});

function getData() {
  axios.get('http://localhost:8081/api/reminders').then((response) => {
    reminders.value = response.data;
  });
}

function addData() {
  axios.post('http://localhost:8081/api/reminders', reminder.value).then(() => {
    getData();
    reminder.value.data = '';
    reminder.value.due_date = '';
  });
}
</script>
