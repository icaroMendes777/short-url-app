<template>

    <div class="content-center w-max">
        <div class="w-full max-w-xs">
            <form :action="route('url.save')" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Link:
                </label>
                <input v-model="oldLink" name="redirect_url" @input="validateUrl" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Link">

                <p v-if="oldLink && !isValidUrl" class="text-[10px] text-red-500">
                    **entre com um link válido
                </p>


                <button v-if="oldLink && isValidUrl"
                        type="submit"
                        class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
                  Gerar shortlink
                </button>

              </div>
            </form>

            <div v-if="shortUrl">
                <label for="redirectUrl">Shortlink gerado:</label>
                <div class="flex">
                  <input :value="shortUrl" @input="$emit('update:redirectUrl', $event)" type="text" id="redirectUrl" class="mr-2" />
                  <button @click="copyToClipboard" class="bg-blue-500 text-white px-2 py-1 rounded cursor-pointer">
                    Copiar
                  </button>
                </div>
              </div>


          </div>

    </div>

</template>
<script setup>
import { defineProps, ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
const { redirectUrl, shortUrl, saveUrl } = defineProps(['redirectUrl','shortUrl','saveUrl']);

const oldLink = ref(redirectUrl);
const isValidUrl = ref(validateUrl(oldLink.value));


function validateUrl(url) {
    const urlRegex = /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/
    return urlRegex.test(url);
}

const copyToClipboard = () => {
  navigator.clipboard.writeText(shortUrl);
};

watch(oldLink, (newLink) => {
  isValidUrl.value = validateUrl(newLink);
});
</script>
