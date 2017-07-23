<template>
    <div class="select">
        <select :name="name" class="select__input" v-model="value">
            <option v-for="option in values" v-bind:key="option" :value="option.value" :selected="isSelected(option)">{{ option.text }}</option>
        </select>

        <div class="select__container" v-click-outside="hideValues">
            <div class="select__value" @click="toggleValues" :class="{ 'select__value--active': showValues }">{{ active('text') }}</div>

            <transition name="slide-fade">
                <div class="select__values" v-if="showValues">
                    <div 
                        v-for="option in values" 
                        v-bind:key="option" 
                        :class="{
                            'select__values__option': true, 
                            'select__values__option--active': isSelected(option)
                        }"
                        @click="select(option.value, true)"
                        >
                        {{ option.text }}
                    </div>
                </div>
            </transition>
        </div>   
    </div>
</template>

<script>
    export default {
        props: ['name', 'options', 'selected'],

        data: function() {
            return {
                values: [],
                value: undefined,
                showValues: false
            }
        },

        mounted(){
            this.values = eval(this.options);

            if (this.selected == undefined && this.values.length)
                this.value = this.values[0].value;
            else
                this.value = this.selected;

            this.$on('change', function(){
                this.onChange();
            });
        },

        methods: {
            isSelected(option) {
                return option.selected == this.value;
            },

            select(value, closeValues = false) {
                this.value = value;

                if (closeValues)
                    this.hideValues();

                this.$emit('change');
            },

            active(param) {
                if (!this.values.length)
                    return '';

                for (let i in this.values) {
                    if (this.values[i].value == this.value)
                        return this.values[i][param];
                }

                return this.values[0][param];
            },

            toggleValues() {
                this.showValues = !this.showValues;
            },

            hideValues() {
                if (this.showValues)
                    this.showValues = false;
            },

            onChange() {
                
            }
        }
    }
</script>