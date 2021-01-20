<template>
	<div> <!-- parent div -->
		<div class="form-group row">
			<label for class="col-lg-2">Doctors</label>
			<div class="col-lg-10">
				<select class="form-control" :class="{ 'is-invalid': $v.selectedDoctor.$error }" v-model="$v.selectedDoctor.$model" v-on:change="getAvailableSchedules()">
					<option value="" selected></option>
					<option v-for="(doctor, index) in doctors" :key="index" :value="doctor.id">{{ doctor.lname }},  {{ doctor.fname }}</option>
				</select>
				<div class="invalid-feedback" v-if="!$v.selectedDoctor.required">Field is required</div>
			</div>
		</div>

		<div class="form-group row">
			<label for class="col-lg-2">Schedule</label>
			<div class="col-lg-10">
				<!-- <date-picker :schedule="availableSchedules" :disabled="disabled" @emitSched="setSelectedSchedule"></date-picker> -->
				<input type="input" class="form-control" :class="{ 'is-invalid': $v.selectedSchedule.$error }" id="scheduleInput" :disabled="this.disabled" v-model="selectedSchedule"/>
				<div class="invalid-feedback" v-if="!$v.selectedSchedule.required">Field is required</div>
			</div>
		</div>
	</div><!-- parent div -->
</template>

<script>
import { required } from 'vuelidate/lib/validators'
import flatpickr from "flatpickr";

export default {
	data() {
		return {
			'doctors': [],
			'availableSchedules': [],
			'selectedDoctor': "",
			'selectedSchedule': "",
			'disabled': true
		};
	},

	validations: {
    selectedDoctor: {
      required
    },
    selectedSchedule: {
      required
    }
	},
	
	watch: {
		availableSchedules: function() {
			flatpickr("#scheduleInput", {
				enableTime: false,
				dateFormat: "Y-m-d",
				minDate: "today",
				enable: [
					date => {
						const availableScheds = [];
						this.availableSchedules.forEach(el => availableScheds.push(el.dayOfWeek));

						return availableScheds.find(el => el === date.getDay());
					}
				]
			});
		}
	},

	mounted() {
		this.getDoctorsLists()

		flatpickr("#scheduleInput", {
			enableTime: false,
			dateFormat: "Y-m-d",
			minDate: "today",
			enable: [
				date => {
					const availableScheds = [];
					this.availableSchedules.forEach(el => availableScheds.push(el.dayOfWeek));

					return availableScheds.find(el => el === date.getDay());
				}
			]
		})
	},

	methods: {
		getDoctorsLists() {
			axios.get("http://localhost:8000/vue/get_doctors_list")
			.then(response => {
				this.doctors = response.data
			})
		},

		getAvailableSchedules() {
			axios.get("http://localhost:8000/vue/get_available_schedules?doctor_id=" + this.selectedDoctor)
			.then(response => {
				this.availableSchedules = response.data

				this.disabled = false
			})
		},

		setSelectedSchedule(payload) {
			this.selectedSchedule = payload
		}
	}
};
</script>
