<template>
	<div class="container row">
		<div class="sidebar col-md-3">
			<section class="cameras">
				<h2>Cámaras</h2>
				<ul>
					<li v-if="cameras.length === 0" class="empty">No se encontraron camarás</li>
					<li v-for="(camera, index) in cameras" :key="index">
						<span
							v-if="camera.id == activeCameraId"
							:title="formatName(camera.name)"
							class="active"
						>{{ formatName(camera.name) }}</span>
						<span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
							<a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
						</span>
					</li>
				</ul>
			</section>
			<section class="scans">
				<h2>Escaneos</h2>
				<ul v-if="scans.length === 0">
					<li class="empty">No hay escaneos todavía</li>
				</ul>
				<transition-group name="scans" tag="ul">
					<li v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</li>
				</transition-group>
			</section>
		</div>
		<div class="preview-container col-md-9">
			<video id="preview"></video>
		</div>
	</div>
</template>

<script>
import axios from "axios";

export default {
	name: "Scanner",
	data() {
		return {
			scanner: null,
			activeCameraId: null,
			cameras: [],
			scans: []
		};
	},
	mounted: function() {
		var self = this;
		self.scanner = new Instascan.Scanner({
			video: document.getElementById("preview"),
			scanPeriod: 5
		});
		self.scanner.addListener("scan", function(content, image) {
			self.scans.unshift({ date: +Date.now(), content: content });
		});
		Instascan.Camera.getCameras()
			.then(function(cameras) {
				self.cameras = cameras;
				if (cameras.length > 0) {
					self.activeCameraId = cameras[0].id;
					self.scanner.start(cameras[0]);
				} else {
					console.error("No cameras found.");
				}
			})
			.catch(function(e) {
				console.error(e);
			});
	},
	methods: {
		formatName: function(name) {
			return name || "(unknown)";
		},
		selectCamera: function(camera) {
			this.activeCameraId = camera.id;
			this.scanner.start(camera);
        }
    },
    watch: {
        scans: function(email) {
            const sendEmail = email[0].content
            axios.post('http://127.0.0.1:8000/api/nuevoingresoparqueo', {
                email: sendEmail
            }).then(resp => {
                console.log(resp)
            })
        }
    }
};
</script>
