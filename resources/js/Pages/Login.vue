<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import { Button } from "@/Components/ui/button";
import Checkbox from "@/Components/ui/checkbox/Checkbox.vue";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

defineOptions({ layout: null });

const authenticate = () => form.post(route("authenticate"));
</script>

<template>
    <Head title="Login" />

    <div class="w-full lg:grid lg:grid-cols-2 min-h-[100vh]">
        <div class="flex items-center justify-center py-12">
            <div class="mx-auto grid w-[350px] gap-6">
                <div class="grid gap-2 text-center">
                    <h1 class="text-3xl font-bold">Login</h1>
                </div>
                <form @submit.prevent="authenticate" class="grid gap-4">
                    <div class="grid gap-2">
                        <Label for="email">Email</Label>
                        <Input
                            id="email"
                            type="email"
                            v-model="form.email"
                            placeholder="mail@example.com"
                            required
                        />
                        <InputError class="mt-1" :message="form.errors.email" />
                    </div>
                    <div class="grid gap-2">
                        <div class="flex items-center">
                            <Label for="password">Password</Label>
                            <a
                                href="#"
                                class="ml-auto inline-block text-sm underline"
                            >
                                Forgot your password?
                            </a>
                        </div>
                        <Input
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                        />
                        <InputError
                            class="mt-1"
                            :message="form.errors.password"
                        />
                    </div>

                    <div class="flex items-center space-x-2">
                        <Checkbox id="terms" v-model="form.remember" />
                        <label
                            for="terms"
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        >
                            Remember me
                        </label>
                    </div>
                    <Button type="submit" class="w-full"> Login </Button>
                </form>
            </div>
        </div>
        <div class="hidden bg-muted lg:block">
            <img
                src="https://placehold.co/600x400"
                alt="login"
                class="h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
            />
        </div>
    </div>
</template>
