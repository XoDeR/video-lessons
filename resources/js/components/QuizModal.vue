<script setup lang="ts">
import Button from './ui/button/Button.vue';
import Dialog from './ui/dialog/Dialog.vue';
import DialogContent from './ui/dialog/DialogContent.vue';
import DialogDescription from './ui/dialog/DialogDescription.vue';
import DialogFooter from './ui/dialog/DialogFooter.vue';
import DialogHeader from './ui/dialog/DialogHeader.vue';
import DialogTitle from './ui/dialog/DialogTitle.vue';

const props = defineProps<{ open: boolean }>()
const emit = defineEmits(['close'])

function emitClose() {
  emit('close')
}
</script>
<template>
  <Dialog :open="open" @update:open="emitClose">
    <DialogContent class="sm:max-w-[425px]">
      <DialogHeader>
        <DialogTitle>Edit profile</DialogTitle>
        <DialogDescription>
          Make changes to your profile here. Click save when you're done.
        </DialogDescription>
      </DialogHeader>
      <div class="grid gap-4 py-4">
        <div class="grid grid-cols-4 items-center gap-4">
          <Label for="name" class="text-right">
            Name
          </Label>
          <Input id="name" value="Pedro Duarte" class="col-span-3" />
        </div>
        <div class="grid grid-cols-4 items-center gap-4">
          <Label for="username" class="text-right">
            Username
          </Label>
          <Input id="username" value="@peduarte" class="col-span-3" />
        </div>
      </div>
      <DialogFooter>
        <Button type="submit">
          Save changes
        </Button>
      </DialogFooter>
    </DialogContent>
  </Dialog>
</template>