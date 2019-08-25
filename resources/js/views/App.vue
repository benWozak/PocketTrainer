<template>
    <v-content>
        <v-container fluid>
            
             <v-layout v-if="isNew">
                <v-flex xs12 sm6 offset-sm3>
                    <v-card class="grey lighten-2">
                        <v-card-title primary-title class="layout justify-center grey lighten-2">
                            <v-btn class="deep-orange accent-4">Start A Workout Plan!</v-btn>
                        </v-card-title>
                        <v-card-text>
                            <div>{{ results }}</div>
                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>

            <v-layout v-else>
                <v-flex xs12 sm6 offset-sm3>
                    <v-card>
                        <v-card-title primary-title class="layout justify-center grey lighten-2">
                            
                        </v-card-title>
                    </v-card>
                </v-flex>
            </v-layout>
            
        </v-container>
    </v-content>
</template>
<script>
export default {
    data () {
      return {
          isNew: true,
          results: []
      }
    },
    mounted () {
        axios.get('json-api').then(response => (this.results = response.workout))
    }
}
</script>
<style lang="scss">
    .v-content{
        height: screen;
    }
</style>