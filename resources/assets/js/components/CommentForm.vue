<template>
    <form @submit.prevent="createComment" class="mt-2">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-2 text-left">
                   <b>{{ username }}</b> 
                </div>
                <div class="col-sm">
                    <input ref="comment" type="text" class="form-control" placeholder="Write a comment">
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props: ['username', 'getComments', 'comment_id'],
    methods: {
        async createComment () {
            const formData = { 
                name: this.username,
                comment: this.$refs.comment.value,
                comment_id: this.comment_id
            }
            const response = await axios.post('comments/create', formData)
            this.$refs.comment.value = ''
            this.getComments()
        }
    }
}
</script>
