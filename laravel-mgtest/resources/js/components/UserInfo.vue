<script setup lang="ts">
import { computed } from 'vue';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { useInitials } from '@/composables/useInitials';
import type { User } from '@/types';

type Props = {
    user?: User | null;
    showEmail?: boolean;
};

const props = withDefaults(defineProps<Props>(), {
    user: null,
    showEmail: false,
});

const { getInitials } = useInitials();

// Safe user wrapper to avoid null checks in template
const safeUser = computed(() => {
    return (
        props.user ?? ({ name: '', email: '', avatar: '' } as unknown as User)
    );
});

// Compute whether we should show the avatar image
const showAvatar = computed(() => !!safeUser.value?.avatar && safeUser.value.avatar !== '');
</script>

<template>
    <Avatar class="h-8 w-8 overflow-hidden rounded-lg">
        <!-- <AvatarImage v-if="showAvatar" :src="safeUser.avatar || safeUser.value.avatar" :alt="safeUser.value.name" />
        <AvatarFallback class="rounded-lg text-black dark:text-white">
            {{ getInitials(safeUser.value.name) }}
        </AvatarFallback> -->
    </Avatar>

    <div class="grid flex-1 text-left text-sm leading-tight">
        <!-- <span class="truncate font-medium">{{ safeUser.value.name }}</span>
        <span v-if="showEmail" class="truncate text-xs text-muted-foreground">{{ safeUser.value.email }}</span> -->
    </div>
</template>
