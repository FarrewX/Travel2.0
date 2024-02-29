<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Email Verification" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            ก่อนดำเนินการต่อ คุณสามารถยืนยันที่อยู่อีเมลของคุณโดยคลิกลิงก์ที่เราเพิ่งส่งอีเมลถึงคุณได้หรือไม่ หากคุณไม่ได้รับอีเมล เรายินดีส่งอีเมลฉบับอื่นให้คุณ
        </div>

        <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600">
            ลิงก์การยืนยันใหม่ได้ถูกส่งไปยังที่อยู่อีเมลที่คุณระบุไว้ในการตั้งค่าโปรไฟล์ของคุณ
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    ส่งอีเมล์ยืนยันอีกครั้ง
                </PrimaryButton>

                <div>
                    <Link
                        :href="route('profile.show')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        จัดการโปรไฟล์</Link>

                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2"
                    >
                        ออกจากระบบ
                    </Link>
                </div>
            </div>
        </form>
    </AuthenticationCard>
</template>
