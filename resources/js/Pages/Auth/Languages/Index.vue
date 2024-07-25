<script setup lang="ts">
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/Components/ui/card";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/Components/ui/table";
import { Badge } from "@/Components/ui/badge";
import { Button } from "@/Components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
    DialogClose,
} from "@/Components/ui/dialog";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import dayjs from "dayjs";

defineProps({
    languages: Object,
});
</script>

<template>
    <Head title="Languages" />

    <Card class="xl:col-span-2">
        <CardHeader class="flex flex-row items-center">
            <div class="grid gap-2">
                <CardTitle>Languages</CardTitle>
                <CardDescription>
                    Lists of available languages
                </CardDescription>
            </div>
            <div class="ml-auto gap-1">
                <Dialog>
                    <DialogTrigger>
                        <Button size="sm" variant="outline"> New </Button>
                    </DialogTrigger>
                    <DialogContent>
                        <form>
                            <DialogHeader>
                                <DialogTitle>Create Language</DialogTitle>
                                <DialogDescription />
                            </DialogHeader>
                            <div class="grid gap-4 py-6">
                                <div
                                    class="grid grid-cols-4 items-center gap-4"
                                >
                                    <Label for="locale"> Locale </Label>
                                    <Input id="locale" class="col-span-3" />
                                </div>
                                <div
                                    class="grid grid-cols-4 items-center gap-4"
                                >
                                    <Label for="name"> Name </Label>
                                    <Input id="name" class="col-span-3" />
                                </div>
                            </div>
                            <DialogFooter>
                                <Button type="submit">Create</Button>

                                <DialogClose as-child>
                                    <Button type="button" variant="secondary">
                                        Close
                                    </Button>
                                </DialogClose>
                            </DialogFooter>
                        </form>
                    </DialogContent>
                </Dialog>
            </div>
        </CardHeader>

        <CardContent>
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead>Locale</TableHead>
                        <TableHead> Name </TableHead>
                        <TableHead> Flag </TableHead>
                        <TableHead> Created At </TableHead>
                        <TableHead class="text-right"></TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow
                        v-for="language in languages.data"
                        :key="language.id"
                    >
                        <TableCell>
                            <Badge class="text-xs" variant="secondary">
                                {{ language.locale }}
                            </Badge>
                        </TableCell>
                        <TableCell>{{ language.name }}</TableCell>
                        <TableCell>
                            <Badge class="text-xs" variant="outline">
                                WIP
                            </Badge>
                        </TableCell>
                        <TableCell>
                            {{ dayjs(language.created_at) }}
                        </TableCell>
                        <TableCell class="text-right"> icons </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </CardContent>
    </Card>
</template>
