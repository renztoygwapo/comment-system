<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default" v-if="username">
                    <div class="card-header">
                        Awesome Post Title
                        <button @click="username = ''" class="btn btn-default float-right">Change User</button>
                    </div>
                    <div class="card-body">
                        Awesome description of sample post.
                    </div>
                    <div class="card-footer">
                        <ul class="comment-list">
                            <comment 
                            :level="1"
                            v-for="comment in comments"
                            :username="username"
                            :getComments="getComments"
                            :comment="comment"
                            :key="comment.id">
                            </comment>
                        </ul>
                        <comment-form :getComments="getComments" :username="username"></comment-form>
                    </div>
                </div>
                <div class="card card-default" v-else>
                    <div class="card-header">
                        Enter Username
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="setUsername">
                            <div class="row">
                                <div class="col-sm">
                                <input ref="username" type="text" class="form-control" placeholder="Your Username">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                username: '',
                comments: []
            }
        },
        created () {
            this.getComments()
        },
        methods: {
            setUsername () {
                this.username = this.$refs.username.value
            },
            async getComments () {
                const response = await axios.get('comments')
                this.comments = response.data
            }
        }
    }
</script>

<style>
ul.comment-list {
    padding-left: 20px;
    padding-right: 20px;
    margin-bottom: 15px;
}
ul.comment-list li {
    padding: 4px 2px;
}
</style>

