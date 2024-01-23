<template>
    <div class="my-links">
        <hr class="mt-8">
      <h2 class="text-2xl font-bold mb-4 mt-8">Últimos links gerados:</h2>
      <ul class="list-none space-y-2">
        <li v-for="(link, index) in lastLinks" :key="index" class="border-b border-gray-300">
          <a :href="link.originalLink" class="block py-2 px-4 hover:bg-gray-100 transition duration-300">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-blue-500">{{ trimUrl(link.redirect_url) }}</p>
                <p class="text-sm text-gray-500">Gerado em: {{ formatDate(link.updated_at) }}</p>
              </div>
              <a class="ml-4" :href="link.short_url" target="_blank">
                <p class="text-green-500">{{ trimUrl(link.short_url) }} </p>
              </a>

            </div>
          </a>
        </li>
      </ul>
    </div>
  </template>
  <script setup>

  import { defineProps, ref} from 'vue';

    const { lastLinks } = defineProps(['lastLinks']);

    setTimeout(() => {
        console.log(lastLinks)
    }, 2000);

  const links = ref([
    { originalLink: 'https://www.google.com', date: '2022-02-01', shortLink: 'http://short.link/abc', shortLinkDate: '2022-02-05' },
    { originalLink: 'https://github.com', date: '2022-02-02', shortLink: 'http://short.link/def', shortLinkDate: '2022-02-06' },
    { originalLink: 'https://vuejs.org', date: '2022-02-03', shortLink: 'http://short.link/ghi', shortLinkDate: '2022-02-07' },
    // Add more links with original links, shortlinks, and dates as needed
  ]);

  const formatDate = (dateString) => {
    const date = new Date(dateString);
    const day = date.getDate().toString().padStart(2, '0');
    const month = (date.getMonth() + 1).toString().padStart(2, '0');
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
    };

  const trimUrl = (url) => {
    const maxLength = 45;
    return url.length > maxLength ? url.slice(0, maxLength - 3) + '...' : url;
  };
  </script>

  <style scoped>
  .my-links {
    max-width: 400px;
    margin: 0 auto;
  }

  /* Add more styling based on your preferences */
  </style>
