<script>
    export default {
        props: ['answer'],
 
        data () {
            return {
                editing : false,
                body: this.answer.body,
                bodyHtml: this.answer.body_html,
                id: this.answer.id,
                questionId: this.answer.question_id,
                beforeEditCache: null
            }
        },

        methods: {
            edit () {
                this.beforeEditCache = this.body;
                this.editing = true;
            },
            cancel() {
                this.body = this.beforeEditCache;
                this.editing = false; 
            },

            update () {
                axios.patch(this.endpoint,{
                    body: this.body
                })
                .then(res => {
                    this.editing = false;
                    this.body = res.data.body;
                    this.$toast.success(res.data.message, "Success", {timeout: 3000});
                })
                .catch(err => {
                    this.$toast.error(err.response.data.message, "Error", {timeout: 3000});
                });
            },

            destroy() {
                if(confirm('Are you sure?'))
                    axios.delete(this.endpoint)
                    .then(res=> {
                        $(this.$el).fadeOut(500, () => {
                            this.$toast.success(err.data.message, "Success", {timeout: 3000});

                        })
                    });
            },
        },
        computed: {

            isInvalid() {
                return this.body.length < 10;
            },
            endpoint(){
                return `/questions/${this.questionId}/answers/${this.id}`; 
            }
        }
    }
</script>