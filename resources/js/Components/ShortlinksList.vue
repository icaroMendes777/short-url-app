<template>
    <div class="my-links">
        <hr class="mt-8">
      <h2 class="text-2xl font-bold mb-4 mt-8">Últimos links gerados:</h2>
      <ul class="list-none space-y-2">
        <li v-for="(link, index) in links" :key="index" class="border-b border-gray-300">
          <a :href="link.originalLink" class="block py-2 px-4 hover:bg-gray-100 transition duration-300">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-blue-500">{{ trimUrl(link.originalLink) }}</p>
                <p class="text-sm text-gray-500">Original: {{ formatDate(link.date) }}</p>
              </div>
              <div class="ml-4">
                <p class="text-green-500">{{ trimUrl(link.shortLink) }}</p>
                <p class="text-sm text-gray-500">Shortlink: {{ formatDate(link.shortLinkDate) }}</p>
              </div>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 text-gray-400 hover:text-blue-500 transition duration-300"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12zm0-8a2 2 0 11-4 0 2 2 0 014 0z"
                  clip-rule="evenodd"
                />
              </svg>
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
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
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
