<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
//import Welcome from '@/Components/Welcome.vue';
import ShortLinkForm from '@/Components/ShortLinkForm.vue'

import ShortlinksList from '@/Components/ShortlinksList.vue'
import { defineProps } from 'vue';

const props = defineProps(['title','redirectUrl','shortUrl','saveUrl','lastLinks']);


</script>

<template>
    <AppLayout title="Shortlink">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Shortlink System
            </h2>
        </template>



        <div class="py-12 ">


            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl p-4 text-center">
                   <h2 class="text-2xl font-bold mb-4 mt-8"> Entre com um link para gerar sua versão encurtada</h2>

                </div>
            </div>

            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl ">
                    <!-- <Welcome /> -->
                    <div class="w-full grid place-items-center">
                        <ShortLinkForm :redirectUrl="redirectUrl" :shortUrl="shortUrl" :saveUrl="saveUrl"/>
                    </div>

                </div>
            </div>

            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl ">
                    <!-- <Welcome /> -->
                    <div class="w-full grid place-items-center">
                        <ShortlinksList :lastLinks="lastLinks"/>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
