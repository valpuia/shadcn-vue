<script setup lang="ts">
import { Sheet, SheetContent, SheetTrigger } from "@/Components/ui/sheet";
import { Button } from "@/Components/ui/button";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/Components/ui/dropdown-menu";
import { CircleUser, Menu, Package2, Search } from "lucide-vue-next";
import { Input } from "@/Components/ui/input";
import NavLink from "@/Components/NavLink.vue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

const currentRoute = ref(null);

router.on("navigate", () => {
    currentRoute.value = route().current();
});
</script>

<template>
    <header
        :key="currentRoute"
        class="sticky top-0 flex h-16 items-center gap-4 border-b bg-background px-4 md:px-0 container"
    >
        <div
            class="hidden flex-col gap-6 text-lg font-medium md:flex md:flex-row md:items-center md:gap-5 md:text-sm lg:gap-6"
        >
            Logo

            <NavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
            >
                Dashboard
            </NavLink>

            <NavLink
                :href="route('languages.index')"
                :active="route().current('languages.*')"
            >
                Languages
            </NavLink>
        </div>
        <Sheet>
            <SheetTrigger as-child>
                <Button
                    variant="outline"
                    size="icon"
                    class="shrink-0 md:hidden"
                >
                    <Menu class="h-5 w-5" />
                    <span class="sr-only">Toggle navigation menu</span>
                </Button>
            </SheetTrigger>
            <SheetContent side="left">
                <nav class="grid gap-6 text-lg font-medium">
                    <a
                        href="#"
                        class="flex items-center gap-2 text-lg font-semibold"
                    >
                        <Package2 class="h-6 w-6" />
                        <span class="sr-only">Acme Inc</span>
                    </a>
                    <a href="#" class="hover:text-foreground"> Dashboard </a>
                    <a
                        href="#"
                        class="text-muted-foreground hover:text-foreground"
                    >
                        Orders
                    </a>
                    <a
                        href="#"
                        class="text-muted-foreground hover:text-foreground"
                    >
                        Products
                    </a>
                    <a
                        href="#"
                        class="text-muted-foreground hover:text-foreground"
                    >
                        Customers
                    </a>
                    <a
                        href="#"
                        class="text-muted-foreground hover:text-foreground"
                    >
                        Analytics
                    </a>
                </nav>
            </SheetContent>
        </Sheet>
        <div
            class="flex w-full items-center gap-4 md:ml-auto md:gap-2 lg:gap-4"
        >
            <form class="ml-auto flex-1 sm:flex-initial">
                <div class="relative">
                    <Search
                        class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground"
                    />
                    <Input
                        type="search"
                        placeholder="Search products..."
                        class="pl-8 sm:w-[300px] md:w-[200px] lg:w-[300px]"
                    />
                </div>
            </form>
            <DropdownMenu>
                <DropdownMenuTrigger as-child>
                    <Button
                        variant="secondary"
                        size="icon"
                        class="rounded-full"
                    >
                        <CircleUser class="h-5 w-5" />
                        <span class="sr-only">Toggle user menu</span>
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent align="end">
                    <DropdownMenuLabel>My Account</DropdownMenuLabel>
                    <DropdownMenuSeparator />
                    <DropdownMenuItem>Settings</DropdownMenuItem>
                    <DropdownMenuItem>Support</DropdownMenuItem>
                    <DropdownMenuSeparator />
                    <DropdownMenuItem>
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            type="button"
                        >
                            Logout
                        </Link>
                    </DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
    </header>
</template>
