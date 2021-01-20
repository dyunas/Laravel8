<template>
	<div>
		<input type="input" class="form-control" id="scheduleInput" :disabled="this.disabled" v-model="selectedSchedule"/>
	</div>
</template>

<script>
import flatpickr from "flatpickr";

export default {
	props: {
		schedule: {
			type: Array,
			required: true
		},
		disabled: {
			type: Boolean,
			required: true
		}
	},

	watch: {
		schedule: function() {
			flatpickr("#scheduleInput", {
				enableTime: false,
				dateFormat: "Y-m-d",
				minDate: "today",
				enable: [
					date => {
						const availableScheds = [];
						this.schedule.forEach(el => availableScheds.push(el.dayOfWeek));

						return availableScheds.find(el => el === date.getDay());
					}
				]
			});
		},

		selectedSchedule: function() {
			this.emitToParent(this.selectedSchedule)
		}
	},

	data() {
		return {
			'selectedSchedule': ''
		}
	},

	mounted() {
		flatpickr("#scheduleInput", {
			enableTime: false,
			dateFormat: "Y-m-d",
			minDate: "today",
			enable: [
				date => {
					const availableScheds = [];
					this.schedule.forEach(el => availableScheds.push(el.dayOfWeek));

					return availableScheds.find(el => el === date.getDay());
				}
			]
		})

		this.emitToParent()
	},

	methods: {
		emitToParent(selectedSchedule) {
			this.$emit('emitSched', selectedSchedule)
		}
	}
};
</script>