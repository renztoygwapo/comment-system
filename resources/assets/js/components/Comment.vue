<template>
    <li>
        <b>{{ comment.name }} <small>{{ comment.date }}</small></b> - {{ comment.comment }}
        <a v-if="level < 3" href="javascript:void(0)" @click="reply = true">reply</a>
        <a v-if="level < 3 && reply" href="javascript:void(0)" @click="reply = false">| cancel</a>
        <br>
        <div class="row mt-2" v-if="comment.comments && comment.comments.length">
            <div class="col-sm-12">
                <ul class="comment-list">
                    <comment 
                    :level="level + 1"
                    v-for="comment in comment.comments"
                    :username="username"
                    :getComments="getComments"
                    :comment="comment"
                    :key="comment.id">
                    </comment>
                </ul>
            </div>
        </div>
        <div class="row mt-3" v-if="reply && level < 3">
            <div class="col-sm">
                <comment-form  
                :comment_id="comment.id"
                :getComments="getComments" 
                :username="username">
                </comment-form>
            </div>
        </div>
    </li>
</template>

<script>
export default {
    data () {
        return {
            reply: false
        }
    },
    props: ['comment', 'username', 'getComments', 'level']
}
</script>
