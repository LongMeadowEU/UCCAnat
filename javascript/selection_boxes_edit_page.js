// JavaScript Document
function checkinArray(array_regions, array_jscript) {
	for (var i=0; i < array_regions.length; i++){
			console.log(array_regions[i].value);
			var inArrayOrNot = $.inArray(array_regions[i].value, array_jscript);
			console.log(inArrayOrNot);
			if(inArrayOrNot != -1) {
				array_regions[i].checked = true;
			}
	}
}
	$(document).ready(function() {
	
		// for the multiple selection box - type of surgery
		$('#prosection_region_specific').multipleSelect({
			placeholder: "Select specific region", 
			filter: true, 
		});
		$('#prosection_region_specific').multipleSelect("disable");
		
		$("#prosection_region_specific").html(""); //reset child options
		
		if(php_var_prosec_region1 == "ul_shoulder") {
			list_1(specific_shoulder_regions);
		} else if(php_var_prosec_region1 == "ul_arm") {
			list_1(specific_arm_regions);
		} else if(php_var_prosec_region1 == "ul_forearm") {
			list_1(specific_forearm_regions);
		} else if(php_var_prosec_region1 == "ul_hand") {
			list_1(specific_hand_regions);
		} else if(php_var_prosec_region1 == "ul_joints") {
			list_1(specific_joints_regions);
		} else if(php_var_prosec_region1 == "ll_hip_to_knee") {
			list_1(specific_hip_to_knee_regions);
		} else if(php_var_prosec_region1 == "ll_knee_to_foot") {
			list_1(specific_knee_to_foot_regions);
		} else if(php_var_prosec_region1 == "ll_joints") {
			list_1(specific_foot_joints_regions);
		} else if(php_var_prosec_region1 == "ll_dorsum_of_foot") {
			list_1(specific_dorsum_of_foot_regions);
		} else if(php_var_prosec_region1 == "ll_foot_plantar") {
			list_1(specific_foot_plantar_regions);
		} else if(php_var_prosec_region1 == "tx_anterior_wall") {
			list_1(specific_tx_anterior_wall_regions);
		} else if(php_var_prosec_region1 == "tx_posterior_wall") {
			list_1(specific_tx_posterior_wall_regions);
		} else if(php_var_prosec_region1 == "tx_thorax_with_viscera") {
			list_1(specific_tx_thorax_with_viscera_regions);
		} else if(php_var_prosec_region1 == "tx_thoracic_organs") {
			list_1(specific_tx_thoracic_organs_regions);
		} else if(php_var_prosec_region1 == "tx_thorax_no_viscera") {
			list_1(specific_tx_thorax_no_viscera_regions);
		}  else if(php_var_prosec_region1 == "ab_anterior_wall") {
			list_1(specific_ab_anterior_wall_regions);
		} else if(php_var_prosec_region1 == "ab_posterior_wall") {
			list_1(specific_ab_posterior_wall_regions);
		} else if(php_var_prosec_region1 == "ab_abdomen_with_viscera") {
			list_1(specific_ab_abdomen_with_viscera_regions);
		} else if(php_var_prosec_region1 == "ab_abdonimal_organs") {
			list_1(specific_ab_abdonimal_organs);
		} else if(php_var_prosec_region1 == "gu_pelvic_floor_and_perineum") {
			list_1(specific_gu_pelvic_floor_regions);
		} else if(php_var_prosec_region1 == "gu_pelvis_with_viscera") {
			list_1(specific_gu_pelvis_with_viscera_regions);
		} else if(php_var_prosec_region1 == "gu_pelvic_organs") {
			list_1(specific_gu_pelvic_organs_regions);
		} else if(php_var_prosec_region1 == "head_and_neck_face_superficial") {
			list_1(specific_head_and_neck_face_superficial_regions);
		} else if(php_var_prosec_region1 == "head_and_neck_face_deep") {
			list_1(specific_head_and_neck_face_deep_regions);
		} else if(php_var_prosec_region1 == "head_and_neck_oral_and_nasal_cavity") {
			list_1(specific_head_and_neck_oral_and_nasal_cavity_regions);
		} else if(php_var_prosec_region1 == "head_and_neck_neck") {
			list_1(specific_head_and_neck_neck_regions);
		} else if(php_var_prosec_region1 == "back_superficial") {
			list_1(specific_back_superficial_regions);
		} else if(php_var_prosec_region1 == "back_intermediate") {
			list_1(specific_back_intermediate_regions);
		} else if(php_var_prosec_region1 == "back_deep") {
			list_1(specific_back_deep_regions);
		} else if(php_var_prosec_region1 == "back_back_of_neck") {
			list_1(specific_back_back_of_neck_regions);
		} else if(php_var_prosec_region1 == "neuro_brain_with_meninges") {
			list_1(specific_foot_joints_regions);
		} else if(php_var_prosec_region1 == "neuro_whole_brains") {
			list_1(specific_foot_joints_regions);
		} else if(php_var_prosec_region1 == "neuro_circle_of_willis") {
			list_1(specific_foot_joints_regions);
		} else if(php_var_prosec_region1 == "neuro_cranial_nerves") {
			list_1(specific_foot_joints_regions);
		} else if(php_var_prosec_region1 == "neuro_spinal_cord") {
			list_1(specific_foot_joints_regions);
		} else if(php_var_prosec_region1 == "neuro_half_brain") {
			list_1(specific_foot_joints_regions);
		} else if(php_var_prosec_region1 == "neuro_special_neuro_dissection") {
			list_1(specific_foot_joints_regions);
		} else if(php_var_prosec_region1 == "neuro_other") {
			list_1(specific_foot_joints_regions);
		}

	});
	
	$(document).ready(function() {
		
		// for the multiple selection box - type of surgery
		$('#prosection_region_specific_1').multipleSelect({
			placeholder: "Select specific region", 
			filter: true
		});
		$('#prosection_region_specific_1').multipleSelect("disable");
		
		$("#prosection_region_specific_1").html(""); //reset child options
		
		if(php_var_prosec_region2 == "ul_shoulder") {
			list_1_new(specific_shoulder_regions);
		} else if(php_var_prosec_region2 == "ul_arm") {
			list_1_new(specific_arm_regions);
		} else if(php_var_prosec_region2 == "ul_forearm") {
			list_1_new(specific_forearm_regions);
		} else if(php_var_prosec_region2 == "ul_hand") {
			list_1_new(specific_hand_regions);
		} else if(php_var_prosec_region2 == "ul_joints") {
			list_1_new(specific_joints_regions);
		} else if(php_var_prosec_region2 == "ll_hip_to_knee") {
			list_1_new(specific_hip_to_knee_regions);
		} else if(php_var_prosec_region2 == "ll_knee_to_foot") {
			list_1_new(specific_knee_to_foot_regions);
		} else if(php_var_prosec_region2 == "ll_joints") {
			list_1_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region2 == "ll_dorsum_of_foot") {
			list_1_new(specific_dorsum_of_foot_regions);
		} else if(php_var_prosec_region2 == "ll_foot_plantar") {
			list_1_new(specific_foot_plantar_regions);
		} else if(php_var_prosec_region2 == "tx_anterior_wall") {
			list_1_new(specific_tx_anterior_wall_regions);
		} else if(php_var_prosec_region2 == "tx_posterior_wall") {
			list_1_new(specific_tx_posterior_wall_regions);
		} else if(php_var_prosec_region2 == "tx_thorax_with_viscera") {
			list_1_new(specific_tx_thorax_with_viscera_regions);
		} else if(php_var_prosec_region2 == "tx_thoracic_organs") {
			list_1_new(specific_tx_thoracic_organs_regions);
		} else if(php_var_prosec_region2 == "tx_thorax_no_viscera") {
			list_1_new(specific_tx_thorax_no_viscera_regions);
		}  else if(php_var_prosec_region2 == "ab_anterior_wall") {
			list_1_new(specific_ab_anterior_wall_regions);
		} else if(php_var_prosec_region2 == "ab_posterior_wall") {
			list_1_new(specific_ab_posterior_wall_regions);
		} else if(php_var_prosec_region2 == "ab_abdomen_with_viscera") {
			list_1_new(specific_ab_abdomen_with_viscera_regions);
		} else if(php_var_prosec_region2 == "ab_abdonimal_organs") {
			list_1_new(specific_ab_abdonimal_organs);
		} else if(php_var_prosec_region2 == "gu_pelvic_floor_and_perineum") {
			list_1_new(specific_gu_pelvic_floor_regions);
		} else if(php_var_prosec_region2 == "gu_pelvis_with_viscera") {
			list_1_new(specific_gu_pelvis_with_viscera_regions);
		} else if(php_var_prosec_region2 == "gu_pelvic_organs") {
			list_1_new(specific_gu_pelvic_organs_regions);
		} else if(php_var_prosec_region2 == "head_and_neck_face_superficial") {
			list_1_new(specific_head_and_neck_face_superficial_regions);
		} else if(php_var_prosec_region2 == "head_and_neck_face_deep") {
			list_1_new(specific_head_and_neck_face_deep_regions);
		} else if(php_var_prosec_region2 == "head_and_neck_oral_and_nasal_cavity") {
			list_1_new(specific_head_and_neck_oral_and_nasal_cavity_regions);
		} else if(php_var_prosec_region2 == "head_and_neck_neck") {
			list_1_new(specific_head_and_neck_neck_regions);
		} else if(php_var_prosec_region2 == "back_superficial") {
			list_1_new(specific_back_superficial_regions);
		} else if(php_var_prosec_region2 == "back_intermediate") {
			list_1_new(specific_back_intermediate_regions);
		} else if(php_var_prosec_region2 == "back_deep") {
			list_1_new(specific_back_deep_regions);
		} else if(php_var_prosec_region2 == "back_back_of_neck") {
			list_1_new(specific_back_back_of_neck_regions);
		} else if(php_var_prosec_region2 == "neuro_brain_with_meninges") {
			list_1_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region2 == "neuro_whole_brains") {
			list_1_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region2 == "neuro_circle_of_willis") {
			list_1_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region2 == "neuro_cranial_nerves") {
			list_1_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region2 == "neuro_spinal_cord") {
			list_1_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region2 == "neuro_half_brain") {
			list_1_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region2 == "neuro_special_neuro_dissection") {
			list_1_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region2 == "neuro_other") {
			list_1_new(specific_foot_joints_regions);
		}
	});
	
	$(document).ready(function() {
		
		// for the multiple selection box - type of surgery
		$('#prosection_region_specific_2').multipleSelect({
			placeholder: "Select specific region", 
			filter: true
		});
		$('#prosection_region_specific_2').multipleSelect("disable");
		$("#prosection_region_specific_2").html(""); //reset child options
		
		if(php_var_prosec_region3 == "ul_shoulder") {
			list_2_new(specific_shoulder_regions);
		} else if(php_var_prosec_region3 == "ul_arm") {
			list_2_new(specific_arm_regions);
		} else if(php_var_prosec_region3 == "ul_forearm") {
			list_2_new(specific_forearm_regions);
		} else if(php_var_prosec_region3 == "ul_hand") {
			list_2_new(specific_hand_regions);
		} else if(php_var_prosec_region3 == "ul_joints") {
			list_2_new(specific_joints_regions);
		} else if(php_var_prosec_region3 == "ll_hip_to_knee") {
			list_2_new(specific_hip_to_knee_regions);
		} else if(php_var_prosec_region3 == "ll_knee_to_foot") {
			list_2_new(specific_knee_to_foot_regions);
		} else if(php_var_prosec_region3 == "ll_joints") {
			list_2_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region3 == "ll_dorsum_of_foot") {
			list_2_new(specific_dorsum_of_foot_regions);
		} else if(php_var_prosec_region3 == "ll_foot_plantar") {
			list_2_new(specific_foot_plantar_regions);
		} else if(php_var_prosec_region3 == "tx_anterior_wall") {
			list_2_new(specific_tx_anterior_wall_regions);
		} else if(php_var_prosec_region3 == "tx_posterior_wall") {
			list_2_new(specific_tx_posterior_wall_regions);
		} else if(php_var_prosec_region3 == "tx_thorax_with_viscera") {
			list_2_new(specific_tx_thorax_with_viscera_regions);
		} else if(php_var_prosec_region3 == "tx_thoracic_organs") {
			list_2_new(specific_tx_thoracic_organs_regions);
		} else if(php_var_prosec_region3 == "tx_thorax_no_viscera") {
			list_2_new(specific_tx_thorax_no_viscera_regions);
		}  else if(php_var_prosec_region3 == "ab_anterior_wall") {
			list_2_new(specific_ab_anterior_wall_regions);
		} else if(php_var_prosec_region3 == "ab_posterior_wall") {
			list_2_new(specific_ab_posterior_wall_regions);
		} else if(php_var_prosec_region3 == "ab_abdomen_with_viscera") {
			list_2_new(specific_ab_abdomen_with_viscera_regions);
		} else if(php_var_prosec_region3 == "ab_abdonimal_organs") {
			list_2_new(specific_ab_abdonimal_organs);
		} else if(php_var_prosec_region3 == "gu_pelvic_floor_and_perineum") {
			list_2_new(specific_gu_pelvic_floor_regions);
		} else if(php_var_prosec_region3 == "gu_pelvis_with_viscera") {
			list_2_new(specific_gu_pelvis_with_viscera_regions);
		} else if(php_var_prosec_region3 == "gu_pelvic_organs") {
			list_2_new(specific_gu_pelvic_organs_regions);
		} else if(php_var_prosec_region3 == "head_and_neck_face_superficial") {
			list_2_new(specific_head_and_neck_face_superficial_regions);
		} else if(php_var_prosec_region3 == "head_and_neck_face_deep") {
			list_2_new(specific_head_and_neck_face_deep_regions);
		} else if(php_var_prosec_region3 == "head_and_neck_oral_and_nasal_cavity") {
			list_2_new(specific_head_and_neck_oral_and_nasal_cavity_regions);
		} else if(php_var_prosec_region3 == "head_and_neck_neck") {
			list_2_new(specific_head_and_neck_neck_regions);
		} else if(php_var_prosec_region3 == "back_superficial") {
			list_2_new(specific_back_superficial_regions);
		} else if(php_var_prosec_region3 == "back_intermediate") {
			list_2_new(specific_back_intermediate_regions);
		} else if(php_var_prosec_region3 == "back_deep") {
			list_2_new(specific_back_deep_regions);
		} else if(php_var_prosec_region3 == "back_back_of_neck") {
			list_2_new(specific_back_back_of_neck_regions);
		} else if(php_var_prosec_region3 == "neuro_brain_with_meninges") {
			list_2_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region3 == "neuro_whole_brains") {
			list_2_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region3 == "neuro_circle_of_willis") {
			list_2_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region3 == "neuro_cranial_nerves") {
			list_2_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region3 == "neuro_spinal_cord") {
			list_2_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region3 == "neuro_half_brain") {
			list_2_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region3 == "neuro_special_neuro_dissection") {
			list_2_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region3 == "neuro_other") {
			list_2_new(specific_foot_joints_regions);
		}
	});
	
	$(document).ready(function() {
	
		// for the multiple selection box - type of surgery
		$('#prosection_region_specific_3').multipleSelect({
			placeholder: "Select specific region", 
			filter: true, 
		});
		$('#prosection_region_specific_3').multipleSelect("disable");
		
		$("#prosection_region_specific_3").html(""); //reset child options
		
		if(php_var_prosec_region4 == "ul_shoulder") {
			list_3_new(specific_shoulder_regions);
		} else if(php_var_prosec_region4 == "ul_arm") {
			list_3_new(specific_arm_regions);
		} else if(php_var_prosec_region4 == "ul_forearm") {
			list_3_new(specific_forearm_regions);
		} else if(php_var_prosec_region4 == "ul_hand") {
			list_3_new(specific_hand_regions);
		} else if(php_var_prosec_region4 == "ul_joints") {
			list_3_new(specific_joints_regions);
		} else if(php_var_prosec_region4 == "ll_hip_to_knee") {
			list_3_new(specific_hip_to_knee_regions);
		} else if(php_var_prosec_region4 == "ll_knee_to_foot") {
			list_3_new(specific_knee_to_foot_regions);
		} else if(php_var_prosec_region4 == "ll_joints") {
			list_3_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region4 == "ll_dorsum_of_foot") {
			list_3_new(specific_dorsum_of_foot_regions);
		} else if(php_var_prosec_region4 == "ll_foot_plantar") {
			list_3_new(specific_foot_plantar_regions);
		} else if(php_var_prosec_region4 == "tx_anterior_wall") {
			list_3_new(specific_tx_anterior_wall_regions);
		} else if(php_var_prosec_region4 == "tx_posterior_wall") {
			list_3_new(specific_tx_posterior_wall_regions);
		} else if(php_var_prosec_region4 == "tx_thorax_with_viscera") {
			list_3_new(specific_tx_thorax_with_viscera_regions);
		} else if(php_var_prosec_region4 == "tx_thoracic_organs") {
			list_3_new(specific_tx_thoracic_organs_regions);
		} else if(php_var_prosec_region4 == "tx_thorax_no_viscera") {
			list_3_new(specific_tx_thorax_no_viscera_regions);
		}  else if(php_var_prosec_region4 == "ab_anterior_wall") {
			list_3_new(specific_ab_anterior_wall_regions);
		} else if(php_var_prosec_region4 == "ab_posterior_wall") {
			list_3_new(specific_ab_posterior_wall_regions);
		} else if(php_var_prosec_region4 == "ab_abdomen_with_viscera") {
			list_3_new(specific_ab_abdomen_with_viscera_regions);
		} else if(php_var_prosec_region4 == "ab_abdonimal_organs") {
			list_3_new(specific_ab_abdonimal_organs);
		} else if(php_var_prosec_region4 == "gu_pelvic_floor_and_perineum") {
			list_3_new(specific_gu_pelvic_floor_regions);
		} else if(php_var_prosec_region4 == "gu_pelvis_with_viscera") {
			list_3_new(specific_gu_pelvis_with_viscera_regions);
		} else if(php_var_prosec_region4 == "gu_pelvic_organs") {
			list_3_new(specific_gu_pelvic_organs_regions);
		} else if(php_var_prosec_region4 == "head_and_neck_face_superficial") {
			list_3_new(specific_head_and_neck_face_superficial_regions);
		} else if(php_var_prosec_region4 == "head_and_neck_face_deep") {
			list_3_new(specific_head_and_neck_face_deep_regions);
		} else if(php_var_prosec_region4 == "head_and_neck_oral_and_nasal_cavity") {
			list_3_new(specific_head_and_neck_oral_and_nasal_cavity_regions);
		} else if(php_var_prosec_region4 == "head_and_neck_neck") {
			list_3_new(specific_head_and_neck_neck_regions);
		} else if(php_var_prosec_region4 == "back_superficial") {
			list_3_new(specific_back_superficial_regions);
		} else if(php_var_prosec_region4 == "back_intermediate") {
			list_3_new(specific_back_intermediate_regions);
		} else if(php_var_prosec_region4 == "back_deep") {
			list_3_new(specific_back_deep_regions);
		} else if(php_var_prosec_region4 == "back_back_of_neck") {
			list_3_new(specific_back_back_of_neck_regions);
		} else if(php_var_prosec_region4 == "neuro_brain_with_meninges") {
			list_3_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region4 == "neuro_whole_brains") {
			list_3_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region4 == "neuro_circle_of_willis") {
			list_3_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region4 == "neuro_cranial_nerves") {
			list_3_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region4 == "neuro_spinal_cord") {
			list_3_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region4 == "neuro_half_brain") {
			list_3_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region4 == "neuro_special_neuro_dissection") {
			list_3_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region4 == "neuro_other") {
			list_3_new(specific_foot_joints_regions);
		}

	});
	
	$(document).ready(function() {
		
		// for the multiple selection box - type of surgery
		$('#prosection_region_specific_4').multipleSelect({
			placeholder: "Select specific region", 
			filter: true
		});
		$('#prosection_region_specific_4').multipleSelect("disable");
		$("#prosection_region_specific_4").html(""); //reset child options
		
		if(php_var_prosec_region5== "ul_shoulder") {
			list_4_new(specific_shoulder_regions);
		} else if(php_var_prosec_region5== "ul_arm") {
			list_4_new(specific_arm_regions);
		} else if(php_var_prosec_region5== "ul_forearm") {
			list_4_new(specific_forearm_regions);
		} else if(php_var_prosec_region5== "ul_hand") {
			list_4_new(specific_hand_regions);
		} else if(php_var_prosec_region5== "ul_joints") {
			list_4_new(specific_joints_regions);
		} else if(php_var_prosec_region5== "ll_hip_to_knee") {
			list_4_new(specific_hip_to_knee_regions);
		} else if(php_var_prosec_region5== "ll_knee_to_foot") {
			list_4_new(specific_knee_to_foot_regions);
		} else if(php_var_prosec_region5== "ll_joints") {
			list_4_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region5== "ll_dorsum_of_foot") {
			list_4_new(specific_dorsum_of_foot_regions);
		} else if(php_var_prosec_region5== "ll_foot_plantar") {
			list_4_new(specific_foot_plantar_regions);
		} else if(php_var_prosec_region5== "tx_anterior_wall") {
			list_4_new(specific_tx_anterior_wall_regions);
		} else if(php_var_prosec_region5== "tx_posterior_wall") {
			list_4_new(specific_tx_posterior_wall_regions);
		} else if(php_var_prosec_region5== "tx_thorax_with_viscera") {
			list_4_new(specific_tx_thorax_with_viscera_regions);
		} else if(php_var_prosec_region5== "tx_thoracic_organs") {
			list_4_new(specific_tx_thoracic_organs_regions);
		} else if(php_var_prosec_region5== "tx_thorax_no_viscera") {
			list_4_new(specific_tx_thorax_no_viscera_regions);
		}  else if(php_var_prosec_region5== "ab_anterior_wall") {
			list_4_new(specific_ab_anterior_wall_regions);
		} else if(php_var_prosec_region5== "ab_posterior_wall") {
			list_4_new(specific_ab_posterior_wall_regions);
		} else if(php_var_prosec_region5== "ab_abdomen_with_viscera") {
			list_4_new(specific_ab_abdomen_with_viscera_regions);
		} else if(php_var_prosec_region5== "ab_abdonimal_organs") {
			list_4_new(specific_ab_abdonimal_organs);
		} else if(php_var_prosec_region5== "gu_pelvic_floor_and_perineum") {
			list_4_new(specific_gu_pelvic_floor_regions);
		} else if(php_var_prosec_region5== "gu_pelvis_with_viscera") {
			list_4_new(specific_gu_pelvis_with_viscera_regions);
		} else if(php_var_prosec_region5== "gu_pelvic_organs") {
			list_4_new(specific_gu_pelvic_organs_regions);
		} else if(php_var_prosec_region5== "head_and_neck_face_superficial") {
			list_4_new(specific_head_and_neck_face_superficial_regions);
		} else if(php_var_prosec_region5== "head_and_neck_face_deep") {
			list_4_new(specific_head_and_neck_face_deep_regions);
		} else if(php_var_prosec_region5== "head_and_neck_oral_and_nasal_cavity") {
			list_4_new(specific_head_and_neck_oral_and_nasal_cavity_regions);
		} else if(php_var_prosec_region5== "head_and_neck_neck") {
			list_4_new(specific_head_and_neck_neck_regions);
		} else if(php_var_prosec_region5== "back_superficial") {
			list_4_new(specific_back_superficial_regions);
		} else if(php_var_prosec_region5== "back_intermediate") {
			list_4_new(specific_back_intermediate_regions);
		} else if(php_var_prosec_region5== "back_deep") {
			list_4_new(specific_back_deep_regions);
		} else if(php_var_prosec_region5== "back_back_of_neck") {
			list_4_new(specific_back_back_of_neck_regions);
		} else if(php_var_prosec_region5== "neuro_brain_with_meninges") {
			list_4_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region5== "neuro_whole_brains") {
			list_4_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region5== "neuro_circle_of_willis") {
			list_4_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region5== "neuro_cranial_nerves") {
			list_4_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region5== "neuro_spinal_cord") {
			list_4_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region5== "neuro_half_brain") {
			list_4_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region5== "neuro_special_neuro_dissection") {
			list_4_new(specific_foot_joints_regions);
		} else if(php_var_prosec_region5== "neuro_other") {
			list_4_new(specific_foot_joints_regions);
		}


	});
// ************************************************************************************************************************************************************//

function go_function_prosecs(){
	//var prosec_type1_java = $("#type_of_prosection option:selected").val();
            
	if(php_var_prosec_type1 == 'ul') {
		 $("#prosection_region").html(""); //reset child options
		 list(ul_regions);
		 $("#prosection_region").val(php_var_prosec_region1);
	} else if(php_var_prosec_type1 == 'll') {
		$("#prosection_region").html(""); //reset child options
		 list(ll_regions);
		 $("#prosection_region").val(php_var_prosec_region1);
	} else if(php_var_prosec_type1 == 'tx') {
		$("#prosection_region").html(""); //reset child options
		 list(tx_regions);
		 $("#prosection_region").val(php_var_prosec_region1);
	} else if(php_var_prosec_type1 == 'ab') {
		$("#prosection_region").html(""); //reset child options
		 list(ab_regions);
		 $("#prosection_region").val(php_var_prosec_region1);
	} else if(php_var_prosec_type1 == 'gu') {
		$("#prosection_region").html(""); //reset child options
		 list(gu_regions);
		 $("#prosection_region").val(php_var_prosec_region1);
	} else if(php_var_prosec_type1 == 'head_and_neck') {
		$("#prosection_region").html(""); //reset child options
		 list(head_and_neck_regions);
		 $("#prosection_region").val(php_var_prosec_region1);
	} else if(php_var_prosec_type1 == 'back') {
		$("#prosection_region").html(""); //reset child options
		 list(back_regions);
		 $("#prosection_region").val(php_var_prosec_region1);
	} else if(php_var_prosec_type1 == 'neuro') {
		$("#prosection_region").html(""); //reset child options
		 list(neuro_regions);
		 $("#prosection_region").val(php_var_prosec_region1);
	}
	
	if(php_var_prosec_type2 == 'ul') {
		 $("#prosection_region_1").html(""); //reset child options
		 list_new(ul_regions);
		 $("#prosection_region_1").val(php_var_prosec_region2);
	} else if(php_var_prosec_type2 == 'll') {
		$("#prosection_region_1").html(""); //reset child options
		 list_new(ll_regions);
		 $("#prosection_region_1").val(php_var_prosec_region2);
	} else if(php_var_prosec_type2 == 'tx') {
		$("#prosection_region_1").html(""); //reset child options
		 list_new(tx_regions);
		 $("#prosection_region_1").val(php_var_prosec_region2);
	} else if(php_var_prosec_type2 == 'ab') {
		$("#prosection_region_1").html(""); //reset child options
		 list_new(ab_regions);
		 $("#prosection_region_1").val(php_var_prosec_region2);
	} else if(php_var_prosec_type2 == 'gu') {
		$("#prosection_region_1").html(""); //reset child options
		 list_new(gu_regions);
		 $("#prosection_region_1").val(php_var_prosec_region2); 
	} else if(php_var_prosec_type2 == 'head_and_neck') {
		$("#prosection_region_1").html(""); //reset child options
		 list_new(head_and_neck_regions);
		 $("#prosection_region_1").val(php_var_prosec_region2);
	} else if(php_var_prosec_type2 == 'back') {
		$("#prosection_region_1").html(""); //reset child options
		 list_new(back_regions);
		 $("#prosection_region_1").val(php_var_prosec_region2);
	} else if(php_var_prosec_type2 == 'neuro') {
		$("#prosection_region_1").html(""); //reset child options
		 list_new(neuro_regions);
		 $("#prosection_region_1").val(php_var_prosec_region2);
	}
	
	if(php_var_prosec_type3 == 'ul') {
		 $("#prosection_region_2").html(""); //reset child options
		 list_new_2(ul_regions);
		 $("#prosection_region_2").val(php_var_prosec_region3);
	} else if(php_var_prosec_type3 == 'll') {
		$("#prosection_region_2").html(""); //reset child options
		 list_new_2(ll_regions);
		 $("#prosection_region_2").val(php_var_prosec_region3);
	} else if(php_var_prosec_type3 == 'tx') {
		$("#prosection_region_2").html(""); //reset child options
		 list_new_2(tx_regions);
		 $("#prosection_region_2").val(php_var_prosec_region3);
	} else if(php_var_prosec_type3 == 'ab') {
		$("#prosection_region_2").html(""); //reset child options
		 list_new_2(ab_regions);
		 $("#prosection_region_2").val(php_var_prosec_region3);
	} else if(php_var_prosec_type3 == 'gu') {
		$("#prosection_region_2").html(""); //reset child options
		 list_new_2(gu_regions);
		 $("#prosection_region_2").val(php_var_prosec_region3); 
	} else if(php_var_prosec_type3 == 'head_and_neck') {
		$("#prosection_region_2").html(""); //reset child options
		 list_new_2(head_and_neck_regions);
		 $("#prosection_region_2").val(php_var_prosec_region3);
	} else if(php_var_prosec_type3 == 'back') {
		$("#prosection_region_2").html(""); //reset child options
		 list_new_2(back_regions);
		 $("#prosection_region_2").val(php_var_prosec_region3);
	} else if(php_var_prosec_type3 == 'neuro') {
		$("#prosection_region_2").html(""); //reset child options
		 list_new_2(neuro_regions);
		 $("#prosection_region_2").val(php_var_prosec_region3);
	}
	
	if(php_var_prosec_type4 == 'ul') {
		 $("#prosection_region_3").html(""); //reset child options
		 list_new_3(ul_regions);
		 $("#prosection_region_3").val(php_var_prosec_region4);
	} else if(php_var_prosec_type4 == 'll') {
		$("#prosection_region_3").html(""); //reset child options
		 list_new_3(ll_regions);
		 $("#prosection_region_3").val(php_var_prosec_region4);
	} else if(php_var_prosec_type4 == 'tx') {
		$("#prosection_region_3").html(""); //reset child options
		 list_new_3(tx_regions);
		 $("#prosection_region_3").val(php_var_prosec_region4);
	} else if(php_var_prosec_type4 == 'ab') {
		$("#prosection_region_3").html(""); //reset child options
		 list_new_3(ab_regions);
		 $("#prosection_region_3").val(php_var_prosec_region4);
	} else if(php_var_prosec_type4 == 'gu') {
		$("#prosection_region_3").html(""); //reset child options
		 list_new_3(gu_regions);
		 $("#prosection_region_3").val(php_var_prosec_region4); 
	} else if(php_var_prosec_type4 == 'head_and_neck') {
		$("#prosection_region_3").html(""); //reset child options
		 list_new_3(head_and_neck_regions);
		 $("#prosection_region_3").val(php_var_prosec_region4);
	} else if(php_var_prosec_type4 == 'back') {
		$("#prosection_region_3").html(""); //reset child options
		 list_new_3(back_regions);
		 $("#prosection_region_3").val(php_var_prosec_region4);
	} else if(php_var_prosec_type4 == 'neuro') {
		$("#prosection_region_3").html(""); //reset child options
		 list_new_3(neuro_regions);
		 $("#prosection_region_3").val(php_var_prosec_region4);
	}
	
	if(php_var_prosec_type5 == 'ul') {
		 $("#prosection_region_4").html(""); //reset child options
		 list_new_4(ul_regions);
		 $("#prosection_region_4").val(php_var_prosec_region5);
	} else if(php_var_prosec_type5 == 'll') {
		$("#prosection_region_4").html(""); //reset child options
		 list_new_4(ll_regions);
		 $("#prosection_region_4").val(php_var_prosec_region5);
	} else if(php_var_prosec_type5 == 'tx') {
		$("#prosection_region_4").html(""); //reset child options
		 list_new_4(tx_regions);
		 $("#prosection_region_4").val(php_var_prosec_region5);
	} else if(php_var_prosec_type5 == 'ab') {
		$("#prosection_region_4").html(""); //reset child options
		 list_new_4(ab_regions);
		 $("#prosection_region_4").val(php_var_prosec_region5);
	} else if(php_var_prosec_type5 == 'gu') {
		$("#prosection_region_4").html(""); //reset child options
		 list_new_4(gu_regions);
		 $("#prosection_region_4").val(php_var_prosec_region5); 
	} else if(php_var_prosec_type5 == 'head_and_neck') {
		$("#prosection_region_4").html(""); //reset child options
		 list_new_4(head_and_neck_regions);
		 $("#prosection_region_4").val(php_var_prosec_region5);
	} else if(php_var_prosec_type5 == 'back') {
		$("#prosection_region_4").html(""); //reset child options
		 list_new_4(back_regions);
		 $("#prosection_region_4").val(php_var_prosec_region5);
	} else if(php_var_prosec_type5 == 'neuro') {
		$("#prosection_region_4").html(""); //reset child options
		 list_new_4(neuro_regions);
		 $("#prosection_region_4").val(php_var_prosec_region5);
	}
};
	
// ************************************************************************************************************************************************************//
// array lists for the REGIONS selection box values	
	var ul_regions = [
	  {display: "Shoulder", value: "ul_shoulder" },
	  {display: "Arm", value: "ul_arm" }, 
	  {display: "Forearm", value: "ul_forearm" },
	  {display: "Hand", value: "ul_hand" }, 
	  {display: "Joints", value: "ul_joints" }
    ];
	
	var ll_regions = [
	  
	  {display: "Hip to Knee", value: "ll_hip_to_knee" }, 
	  {display: "Knee to Foot", value: "ll_knee_to_foot" },
	  {display: "Dorsum of Foot", value: "ll_dorsum_of_foot" }, 
	  {display: "Foot (Plantar)", value: "ll_foot_plantar" }, 
	  {display: "Joints", value: "ll_joints" }
    ];
	
	var tx_regions = [
	  {display: "Anterior Wall", value: "tx_anterior_wall" },
	  {display: "Posterior Wall", value: "tx_posterior_wall" }, 
	  {display: "Thorax with Viscera", value: "tx_thorax_with_viscera" },
	  {display: "Thorax no Viscera", value: "tx_thorax_no_viscera" }, 
	  {display: "Thoracic Organs", value: "tx_thoracic_organs" }
    ];
	
	var ab_regions = [
	  {display: "Anterior Wall", value: "ab_anterior_wall" },
	  {display: "Posterior Wall", value: "ab_posterior_wall" }, 
	  {display: "Abdomen with Viscera", value: "ab_abdomen_with_viscera" }, 
	  {display: "Abdominal Organs", value: "ab_abdonimal_organs" }
    ];
	
	var gu_regions = [
	  {display: "Pelvic Floor and Perineum", value: "gu_pelvic_floor_and_perineum" },
	  {display: "Pelvis with Viscera", value: "gu_pelvis_with_viscera" }, 
	  {display: "Pelvic Organs", value: "gu_pelvic_organs" }
    ];
	
	var head_and_neck_regions = [
	  {display: "Face Superficial", value: "head_and_neck_face_superficial" },
	  {display: "Face Deep", value: "head_and_neck_face_deep" }, 
	  {display: "Neck", value: "head_and_neck_neck" }, 
	  {display: "Oral and Nasal Cavity", value: "head_and_neck_oral_and_nasal_cavity" }
    ];
	
	var back_regions = [
	  {display: "Superficial", value: "back_superficial" },
	  {display: "Intermediate", value: "back_intermediate" }, 
	  {display: "Deep", value: "back_deep" }, 
	  {display: "Back of Neck", value: "back_back_of_neck" }
    ];
	
	var neuro_regions = [
	  {display: "Brain with Meninges", value: "neuro_brain_with_meninges" },
	  {display: "Whole Brain", value: "neuro_whole_brains" }, 
	  {display: "Circle of Willis", value: "neuro_circle_of_willis" },
	  {display: "Cranial Nerves", value: "neuro_cranial_nerves" },
	  {display: "Spinal Cord", value: "neuro_spinal_cord" },
	  {display: "Half Brain", value: "neuro_half_brain" },
	  {display: "Special Neuro Dissections", value: "neuro_special_neuro_dissection" },
	  {display: "Other", value: "neuro_other" }
    ];
	
// ************************************************************************************************************************************************************//	
// array lists for the SPECIFIC REGIONS selection box values		
	var specific_shoulder_regions = [
	  {display: "Deltoid", value: "shoulder_deltoid"},
	  {display: "Teres Major", value: "shoulder_teres_major"}, 
	  {display: "Supraspinatus", value: "shoulder_supraspinatus"},
	  {display: "Infraspinatus", value: "shoulder_infraspinatus"},
	  {display: "Teres Minor", value: "shoulder_teres_minor"},
	  {display: "Subscapularis", value: "shoulder_subscapularis"}, 
	  {display: "Axillary nerve", value: "shoulder_axillary_nerve"},
	  {display: "Posterior Circumflex Humeral Artery", value: "shoulder_posterior_circumflex_humeral_artery"},
	  {display: "Long Head of Triceps", value: "shoulder_long_head_of_triceps"},
	  {display: "Coraco-acromial Ligament", value: "shoulder_coraco_acromial_ligament"},
	  {display: "Suprascapular Nerve", value: "shoulder_suprascapular_nerve"},
	  {display: "Capsule", value: "shoulder_capsule"},
	  {display: "Long Head of Biceps Piercing Capsule", value: "shoulder_long_head_of_biceps_piercing_capsule"},
	  {display: "Articulating Surfaces", value: "shoulder_articulating_surfaces"},
	  {display: "Glenoid Labrum", value: "shoulder_glenoid_labrum"}
    ];
	
	var specific_arm_regions = [
	  {display: "Biceps Tendon", value: "arm_biceps_tendon" },
	  {display: "Bicipital Aponeurosis", value: "arm_bicipital_aponeurosis" }, 
	  {display: "Brachial Artery", value: "arm_brachial_artery" },
	  {display: "Radial Artery", value: "arm_radial_artery" },
	  {display: "Ulnar Artery", value: "arm_ulnar_artery" },
	  {display: "Median Nerve", value: "arm_median_nerve" },
	  {display: "Dorsal Venous Arch", value: "arm_dorsal_venous_arch" },
	  {display: "Basilic Vein", value: "arm_basilic_vein" },
	  {display: "Cephalic Vein", value: "arm_cephalic_vein" },
	  {display: "Median Cubital Vein", value: "arm_median_cubital_vein" },
	  {display: "Biceps", value: "arm_biceps" },
	  {display: "Brachialis", value: "arm_brachialis"},
	  {display: "Coracobrachialis", value: "arm_coracobrachialis"},
	  {display: "Musculocutaneous Nerve", value: "arm_musculocutaneous_nerve"},
	  {display: "Lateral Cutaneous Nerve of Forearm", value: "arm_lateral_cutaneous_nerve_of_forearm"},
	  {display: "Profunda Brachii Artery", value: "arm_profunda_brachii_artery"},
	  {display: "Triceps", value: "arm_triceps"},
	  {display: "Radial nerve", value: "arm_radial_nerve"},
	  {display: "Radial groove", value: "arm_radial_groove"},
	  {display: "Ulnar nerve", value: "arm_ulnar_nerve"}
    ];
	
	var specific_forearm_regions = [
	  {display: "Dorsal Venous Arch", value: "forearm_dorsal_venous_arch" },
	  {display: "Cephalic Vein", value: "forearm_cephalic_vein" }, 
	  {display: "Common Flexor Origin", value: "forearm_common_flexor_origin" },
	  {display: "Pronator Teres", value: "forearm_pronator_teres" },
	  {display: "Flexor Carpi Radialis", value: "forearm_flexor_capri_radialis" },
	  {display: "Palmaris Longus", value: "forearm_palmaris_longus" },
	  {display: "Flexor Carpi Ulnaris", value: "forearm_flexor_capri_ulnaris" },
	  {display: "Flexor Digitorum Superficialis", value: "forearm_flexor_digitorum_superficialis" },
	  {display: "Flexor Pollicis Longus", value: "forearm_flexor_pollicis_longus" },
	  {display: "Flexor Digitorum Profundus", value: "forearm_flexor_digitorum_profundus" },
	  {display: "Pronator Quadratus", value: "forearm_pronator_quadratus" },
	  {display: "Brachioradialis", value: "forearm_brachioradialis"},
	  {display: "Brachial Artery", value: "forearm_brachial_artery"},
	  {display: "Radial Artery", value: "forearm_radial_artery"},
	  {display: "Ulnar Artery", value: "forearm_ulnar_artery"},
	  {display: "Interosseus Membrane", value: "forearm_interosseus_membrane"},
	  {display: "Median Nerve", value: "forearm_median_nerve"},
	  {display: "Ulnar Nerve", value: "forearm_ulnar_nerve"},
	  {display: "Extensor Retinaculum", value: "forearm_extensor_retinaculum"},
	  {display: "Common Extensor Origin", value: "forearm_common_extensor_origin"},
	  {display: "Extensor Carpi Radialis Longus", value: "forearm_extensor_carpi_radialis_longus"},
	  {display: "Extensor Carpi Radialis Brevis", value: "forearm_extensor_carpi_radialis_brevis"},
	  {display: "Extensor Digitorum", value: "forearm_extensor_digitorum"},
	  {display: "Extensor Carpi Ulnaris", value: "forearm_extensor_carpi_ulnaris"},
	  {display: "Extensor Digiti Minimi", value: "forearm_extensor_digiti_minimi"},
	  {display: "Extensor Expansions", value: "forearm_extensor_expansions"},
	  {display: "Supinator", value: "forearm_supinator"},
	  {display: "Abductor Pollicis Longus", value: "forearm_abductor_pollicis_longus"},
	  {display: "Extensor Pollicis Longus", value: "forearm_extensor_pollicis_longus"},
	  {display: "Extensor Pollicis Brevis", value: "forearm_extensor_pollicis_brevis"},
	  {display: "Extensor Indicis", value: "forearm_extensor_indicis"},
	  {display: "Cephalic Vein", value: "forearm_cephalic_vein"},
	  {display: "Posterior Interosseus Branch of Radial Artery", value: "forearm_posterior_interosseus_branch_of_radial_artery"}
    ];
	
	var specific_hand_regions = [
	  {display: "Flexor Retinaculum", value: "hand_flexor_retinaculum" },
	  {display: "Carpal Tunnel", value: "hand_carpal_tunnel" }, 
	  {display: "Median Nerve in Tunnel", value: "hand_median_nerve_in_tunnel" },
	  {display: "Ulnar Nerve", value: "hand_ulnar_nerve" },
	  {display: "Palmar Aponeurosis", value: "hand_palmar_aponeurosis" },
	  {display: "Ulnar Artery", value: "hand_ulnar_artery" },
	  {display: "Superficial Palmar Arch", value: "hand_superficial_palmar_arch" },
	  {display: "Common Palmar Digital Arteries", value: "hand_common_palmar_digital_arteries" },
	  {display: "Proper Palmar Digital Arteries", value: "hand_proper_palmar_digital_arteries" },
	  {display: "Median Nerve", value: "hand_median_nerve" },
	  {display: "Digital Branches of Median", value: "hand_digital_branches_of_median" },
	  {display: "Digital Branches of Ulnar Nerves", value: "hand_digital_branches_of_ulnar_nerves"},
	  {display: "Flexor Retinaculum", value: "hand_flexor_retinaculum"},
	  {display: "Abductor Pollicis Brevis", value: "hand_abductor_pollicis_brevis"},
	  {display: "Flexor Pollicis Brevis", value: "hand_flexor_pollicis_brevis"},
	  {display: "Opponens pollicis", value: "hand_Opponens_pollicis"},
	  {display: "Lumbricals", value: "hand_lumbricals"},
	  {display: "Abductor Digiti Minimi", value: "hand_abductor_digiti_minimi"},
	  {display: "Flexor Digiti Minimi", value: "hand_flexor_digiti_minimi"},
	  {display: "Opponens Digiti Minimi", value: "hand_opponens_digiti_minimi"},
	  {display: "Tendons of Long Flexors", value: "hand_tendons_of_long_flexors"},
	  {display: "Flexor Digitorum Profundus", value: "hand_flexor_digitorum_profundus"},
	  {display: "Flexor Digitorum Superficialis", value: "hand_flexor_digitorum_superficialis"},
	  {display: "Fibrous Flexor Sheaths Covering Flexor Tendons", value: "hand_fibrous_flexor_sheaths_covering_flexor_tendons"},
	  {display: "Insertions of Flexor Digitorum Profundus", value: "hand_insertions_of_flexor_digitorum_profundus"},
	  {display: "Insertions of Flexor Digitorum Superficialis", value: "hand_insertions_of_flexor_digitorum_superficialis"},
	  {display: "Synovial Sheaths", value: "hand_synovial_sheaths"},
	  {display: "Adductor Pollicis", value: "hand_adductor_pollicis"}, 
	  {display: "Interossei Palmar", value: "hand_interossei_palmar"},
	  {display: "Interossei Dorsal", value: "hand_interossei_dorsal"},
	  {display: "Radial Artery", value: "hand_radial_artery"},
	  {display: "Deep Branch of Ulnar Artery", value: "hand_deep_branch_of_ulnar_artery"},
	  {display: "Deep Palmar Arch", value: "hand_deep_palmar_arch"},
	  {display: "Palmar Metacarpal Arteries", value: "hand_palmar_metacarpal_arteries"}
    ];
	
	var specific_joints_regions = [
	  {display: "Shoulder", value: "joints_shoulder"},
	  {display: "Elbow", value: "joints_elbow"}, 
	  {display: "Wrist", value: "joints_wrist"},
	  {display: "Joints of the Hand", value: "joints_joints_of_the_hand"}
    ];
	
	var specific_hip_to_knee_regions = [
	  {display: "Great Saphenous Vein ", value: "hip_to_knee_great_saphenous_vein"},
	  {display: "Saphenous opening in Deep Fascia", value: "hip_to_knee_saphenous_opening_in_deep_fascia"}, 
	  {display: "Fascia Lata", value: "hip_to_knee_fascia_lata"},
	  {display: "Iliotibial Tract", value: "hip_to_knee_iliotibial_tract"},
	  {display: "Lateral Cutaneous Nerve of Thigh", value: "hip_to_knee_lateral_cutaneous_nerve_of_thigh"},
	  {display: "Femoral Triangle", value: "hip_to_knee_femoral_triangle"},
	  {display: "Femoral Ring", value: "hip_to_knee_femoral_ring"},
	  {display: "Femoral Sheath", value: "hip_to_knee_femoral_sheath"},
	  {display: "Femoral Artery and Branches", value: "hip_to_knee_femoral_artery_and_branches"},
	  {display: "Deep Femoral Artery / Profunda Femoris", value: "hip_to_knee_deep_femoral_artery_profunda_femoris"},
	  {display: "Lateral Circumflex Femoral Artery", value: "hip_to_knee_lateral_circumflex_femoral_artery"},
	  {display: "Medial Circumflex Femoral Artery", value: "hip_to_knee_medial_circumflex_femoral_artery"},
	  {display: "Femoral Vein", value: "hip_to_knee_femoral_vein"},
	  {display: "Femoral Nerve", value: "hip_to_knee_femoral_nerve"},
	  {display: "Femoral Nrevemuscular Branches", value: "hip_to_knee_femoral_nrevemuscular_branches"},
	  {display: "Sensory Branches of Saphenous Nerve", value: "hip_to_knee_sensory_branches_of_saphenous_nerve"},
	  {display: "Adductor Canal Boundaries", value: "hip_to_knee_adductor_canal_boundaries"},
	  {display: "Pectineus", value: "hip_to_knee_pectineus"},
	  {display: "Psoas", value: "hip_to_knee_psoas"},
	  {display: "Iliacus", value: "hip_to_knee_iliacus"},
	  {display: "Quadriceps Femoris", value: "hip_to_knee_quadriceps_femoris"},
	  {display: "Vastus Intermedius", value: "hip_to_knee_vastus_intermedius"},
	  {display: "Vastus Medialis", value: "hip_to_knee_vastus_medialis"},
	  {display: "Rectus Femoris", value: "hip_to_knee_rectus_femoris"},
	  {display: "Vastus Lateralis", value: "hip_to_knee_vastus_lateralis"},
	  {display: "Adductor Longus", value: "hip_to_knee_adductor_longus"},
	  {display: "Adductor Brevis", value: "hip_to_knee_adductor_brevis"},
	  {display: "Adductor Magnus", value: "hip_to_knee_adductor_magnus"},
	  {display: "Gracilis", value: "hip_to_knee_gracilis"},
	  {display: "Obturator Nerve", value: "hip_to_knee_obturator_nerve"},
	  {display: "Gluteus Maximus", value: "hip_to_knee_gluteus_maximus"},
	  {display: "Gluteus Medius", value: "hip_to_knee_gluteus_medius"},
	  {display: "Gluteus Minimus", value: "hip_to_knee_gluteus_minimus"},
	  {display: "Tensor Fascia Lata", value: "hip_to_knee_tensor_fascia_lata"},
	  {display: "Posterior Cutaneous Nerve of the Thigh", value: "hip_to_knee_posterior_cutaneous_nerve_of_the_thigh"},
	  {display: "Greater Sciatic Foramen", value: "hip_to_knee_greater_sciatic_foramen"},
	  {display: "Piriformis", value: "hip_to_knee_piriformis"},
	  {display: "Obturator Internus", value: "hip_to_knee_obturator_internus"},
	  {display: "Gemellus Superior", value: "hip_to_knee_gemellus_superior"},
	  {display: "Gemellus Inferior", value: "hip_to_knee_gemellus_inferior"},
	  {display: "Quadratus Femoris", value: "hip_to_knee_quadratus_femoris"},
	  {display: "Inferior Gluteal Nerve", value: "hip_to_knee_inferior_gluteal_nerve"},
	  {display: "Superior Gluteal Nerve", value: "hip_to_knee_superior_gluteal_nerve"},
	  {display: "Inferior Gluteal Artery", value: "hip_to_knee_inferior_gluteal_artery"},
	  {display: "Biceps Femoris", value: "hip_to_knee_biceps_femoris"},
	  {display: "Semitendinosus", value: "hip_to_knee_semitendinosus"},
	  {display: "Semimembranosus", value: "hip_to_knee_semimembranosus"},
	  {display: "adductor Magnus", value: "hip_to_knee_adductor_magnus"},
	  {display: "Sciatic Nerve", value: "hip_to_knee_sciatic_nerve"},
	  {display: "Common Peroneal Nerve", value: "hip_to_knee_common_peroneal_nerve"},
	  {display: "Tibial Nerve", value: "hip_to_knee_tibeal_nerve"},
	  {display: "Arterial Anastomosis Along Back of Thigh", value: "hip_to_knee_arterial_anastomosis_along_back_of_thigh"},
	  {display: "Popliteal Artery", value: "hip_to_knee_popliteal_artery"},
	  {display: "Popliteal Vein", value: "hip_to_knee_popliteal_vein"},
	  {display: "Popliteal Artery Muscular Branches", value: "hip_to_knee_popliteal_artery_muscular_branches"},
	  {display: "Popliteal Artery Genicular Branches", value: "hip_to_knee_popiteal_artery_genicular_branches"},
	  {display: "Anterior Tibial Artery", value: "hip_to_knee_anterior_tibial_artery"},
	  {display: "Posterior Tibial Artery", value: "hip_to_knee_posterior_tibial_artery"},
	  {display: "Pelvic Organs", value: "hip_to_knee_pelvic_organs"},
	  {display: "Pelvic Blood Vessels", value: "hip_to_knee_pelvic_blood_vessels"},
	  {display: "Pelvic Wall", value: "hip_to_knee_pelvic_wall"}
    ];
	
	var specific_knee_to_foot_regions = [
	  {display: "Long Saphenous Vein", value: "knee_to_foot_long_saphenous_vein"},
	  {display: "Saphenous nerve", value: "knee_to_foot_saphenous_nerve"},
	  {display: "Extensor retinaculum", value: "knee_to_foot_extensor_retinaculum"},
	  {display: "Peroneal retinaculum", value: "knee_to_foot_peroneal_retinaculum"},
	  {display: "Tibialis anterior", value: "knee_to_foot_tibialis_anterior"},
	  {display: "Extensor hallucis longus", value: "knee_to_foot_extensor_hallucis_longus"},
	  {display: "Extensor digitorum longus", value: "knee_to_foot_extensor_digitorum_longus"},
	  {display: "Peroneus longus ", value: "knee_to_foot_peroneus_longus"},
	  {display: "Peroneus brevis", value: "knee_to_foot_peroneus_brevis"},
	  {display: "Peroneus tertius", value: "knee_to_foot_peroneus_tertius"},
	  {display: "Anterior tibial artery", value: "knee_to_foot_anterior_tibial_artery"},
	  {display: "Dorsalis pedis artery", value: "knee_to_foot_dorsalis_pedis_artery"},
	  {display: "Common peroneal nerve", value: "knee_to_foot_common_peroneal_nerve"},
	  {display: "Superficial peroneal nerve", value: "knee_to_foot_superficial_peroneal_nerve"},
	  {display: "Deep peroneal nerve", value: "knee_to_foot_deep_peroneal_nerve"},
	  {display: "Short saphenous vein", value: "knee_to_foot_short_saphenous_vein"},
	  {display: "Popliteal artery", value: "knee_to_foot_popliteal_artery"},
	  {display: "Anterior tibial artery", value: "knee_to_foot_anterior_tibial_artery"},
	  {display: "Posterior tibial artery", value: "knee_to_foot_posterior_tibial_artery"},
	  {display: "Peroneal artery", value: "knee_to_foot_peroneal_artery"},
	  {display: "Lateral plantar artery", value: "knee_to_foot_lateral_plantar_artery"},
	  {display: "Medial plantar artery", value: "knee_to_foot_medial_plantar_artery"},
	  {display: "Sural nerve", value: "knee_to_foot_sural_nerve"},
	  {display: "Tibial nerve", value: "knee_to_foot_tibial_nerve"},
	  {display: "Lateral plantar nerve", value: "knee_to_foot_lateral_plantar_nerve"},
	  {display: "Medial plantar nerve", value: "knee_to_foot_medial_plantar_nerve"},
	  {display: "Gastrocnemius", value: "knee_to_foot_gastrocnemius"},
	  {display: "Soleus", value: "knee_to_foot_soleus"},
	  {display: "Plantaris", value: "knee_to_foot_plantaris"},
	  {display: "Tendo Calcaneus", value: "knee_to_foot_tendo_calcaneus"},
	  {display: "Flexor Hallucis Longus", value: "knee_to_foot_flexor_hallucis_longus"},
	  {display: "Flexor Digitorum Longus", value: "knee_to_foot_flexor_digitorum_longus"},
	  {display: "Tibialis Posterior", value: "knee_to_foot_tibialis_posterior"},
	  {display: "Flexor Retinaculum", value: "knee_to_foot_flexor_retinaculum"},
	  {display: "Fibrous Sheaths of Tendons", value: "knee_to_foot_fibrous_sheaths_of_tendons"},
	  {display: "Plantar Aponeurosis ", value: "knee_to_foot_plantar_aponeurosis"},
	  {display: "Abductor Hallucis  ", value: "knee_to_foot_abductor_hallucis"},
	  {display: "Flexor Digitorum Brevis  ", value: "knee_to_foot_flexor_digitorium_brevis"},
	  {display: "Abductor Digiti Minimi  ", value: "knee_to_foot_abductor_digiti_minimi"},
	  {display: "The Flexor Accessorius  ", value: "knee_to_foot_the_flexor_accessorius"},
	  {display: "Lumbrical Muscles  ", value: "knee_to_foot_lumbrical_muscles"},
	  {display: "Short Flexors of the Great Toe ", value: "knee_to_foot_short_flexors_of_the_great_toe"},
	  {display: "Short Flexors of the Little Toe", value: "knee_to_foot_short_flexors_of_the_little_toe"},
	  {display: "Adductor of the Great Toe", value: "knee_to_foot_adductor_of_the_great_toe"},
	  {display: "Interossei", value: "knee_to_foot_interossei"},
	  {display: "Peroneus Longus  ", value: "knee_to_foot_peroneus_longus"},
	  {display: "Tibialis Posterior ", value: "knee_to_foot_tibialis_posterior"}
    ];
	
	var specific_foot_joints_regions = [
	  {display: "Hip", value: "foot_joints_hip"},
	  {display: "Knee", value: "foot_joints_knee"}, 
	  {display: "Ankle", value: "foot_joints_ankle"},
	  {display: "Joints of the Foot", value: "foot_joints_joints_of_the_foot"}
    ];
	
	var specific_dorsum_of_foot_regions = [
	  {display: "Tendons of Tibialis Anterior", value: "dorsum_of_foot_tendons_of_tibialis_anterior"},
	  {display: "Extensor Digitorum Longus", value: "dorsum_of_foot_extensor_digitorum_longus"},
	  {display: "Extensor Hallucis Longus", value: "dorsum_of_foot_extensor_hallucis_longus"},
	  {display: "Extensor Halluis Brevis", value: "dorsum_of_foot_extensor_halluis_brevis"},
	  {display: "Extensor Digitorum Brevis", value: "dorsum_of_foot_extensor_digitorum_brevis"},
	  {display: "Dorsalis Pedis Artery", value: "dorsum_of_foot_dorsalis_pedis_artery"},
	  {display: "Saphenous Vein", value: "dorsum_of_foot_saphenous_vein"},
	  {display: "Superficial Peroneal Nerve and Branches", value: "dorsum_of_foot_superficial_peroneal_nerve_and_branches"},
	  {display: "Deep Peroneal Nerve and Branches", value: "dorsum_of_foot_deep_peroneal_nerve_and_branches"}
	 ];
	 
	 var specific_foot_plantar_regions = [
	  {display: "Tendons of Peroneus Longus", value: "foot_plantar_tendons_of_peroneus_longus"},
	  {display: "Tendons of Peroneus Brevis", value: "foot_plantar_tendons_of_peroneus_brevis"},
	  {display: "Achilles Tendon", value: "foot_plantar_achilles_tendon"},
	  {display: "Tendons of Tibialis Posterior", value: "foot_plantar_tendons_of_tibialis_posterior"},
	  {display: "Tendon of Flexor Hallucis Longus", value: "foot_plantar_tendon_of_flexor_hallucis_longus"},
	  {display: "Tendon of Flexor Digitorum Longus", value: "foot_plantar_tendon_of_flexor_digitorum_longus"},
	  {display: "Flexor Hallucis Brevis", value: "foot_plantar_flexor_hallucis_brevis"},
	  {display: "Abductor Hallucis", value: "foot_plantar_abductor_hallucis"},
	  {display: "Flexor Digiti Minimi", value: "foot_plantar_flexor_digiti_minimi"},
	  {display: "Abductor Digiti Minimi", value: "foot_plantar_abductor_digiti_minimi"},
	  {display: "Opponents Digiti Minimi", value: "foot_plantar_opponents_digiti_minimi"},
	  {display: "Lumbricals", value: "foot_plantar_lumbricals"},
	  {display: "Flexor Digitorum Brevis", value: "foot_plantar_flexor_digitorum_brevis"},
	  {display: "Interosseous Muscles", value: "foot_plantar_interosseous_muscles"},
	  {display: "Posterior Tibial Artery", value: "foot_plantar_posterior_tibial_artery"},
	  {display: "Tibial Nerve", value: "foot_plantar_tibial_nerve"},
	  {display: "Medial Plantar Nerve", value: "foot_plantar_medial_plantar_nerve"},
	  {display: "Lateral Plantar Nerve", value: "foot_plantar_lateral_plantar_nerve"}
	 ];
	
	var specific_gu_pelvic_floor_regions = [
	  {display: "Obturator Internus", value: "gu_pelvic_floor_obturator_internus"},
	  {display: "Piriformis", value: "gu_pelvic_floor_piriformis"}, 
	  {display: "Levator Ani", value: "gu_pelvic_floor_levator_ani"},
	  {display: "Sphincter Vaginae", value: "gu_pelvic_floor_sphincter_vaginae"},
	  {display: "Puborectalis", value: "gu_pelvic_floor_puborectalis"},
	  {display: "Coccygeus", value: "gu_pelvic_floor_coccygeus"}, 
	  {display: "Perineal Body", value: "gu_pelvic_floor_perineal_body"},
	  {display: "Ventral Rami of Sacral Nerves", value: "gu_pelvic_floor_ventral_rami_of_sacral_nerves"},
	  {display: "Lumbosacral Trunk", value: "gu_pelvic_floor_lumbosacral_trunk"},
	  {display: "Sciatic Nerve", value: "gu_pelvic_floor_sciatic_nerve"}, 
	  {display: "Obturator Nerve", value: "gu_pelvic_floor_obturator_nerve"},
	  {display: "Superior Gluteal Nerve", value: "gu_pelvic_floor_superior_gluteal_nerve"},
	  {display: "Inferior Gluteal Nerve", value: "gu_pelvic_floor_inferior_gluteal_nerve"},
	  {display: "Pudendal Nerve", value: "gu_pelvic_floor_pudendal_nerve"}, 
	  {display: "Common Iliac Artery", value: "gu_pelvic_floor_common_iliac_artery"},
	  {display: "Common Iliac Vein", value: "gu_pelvic_floor_common_iliac_vein"},
	  {display: "External Iliac Artery ", value: "gu_pelvic_floor_external_iliac_artery"},
	  {display: "External Iliac Vein", value: "gu_pelvic_floor_external_iliac_vein"}, 
	  {display: "Internal Iliac Artery", value: "gu_pelvic_floor_internal_iliac_artery"},
	  {display: "Internal Iliac Vein", value: "gu_pelvic_floor_internal_iliac_vein"},
	  {display: "Superior Gluteal Artery", value: "gu_pelvic_floor_superior_gluteal_artery"},
	  {display: "Inferior Gluteal Artery", value: "gu_pelvic_floor_inferior_gluteal_artery"}, 
	  {display: "Obturator Artery", value: "gu_pelvic_floor_obturator_artery"},
	  {display: "Internal Pudendal Artery", value: "gu_pelvic_floor_internal_pudendal_artery"},
	  {display: "Superior Vesical Artery", value: "gu_pelvic_floor_superior_vesical_artery"},
	  {display: "Inferior Vesical Artery ", value: "gu_pelvic_floor_inferior_vesical_artery"},
	  {display: "Vaginal Artery", value: "gu_pelvic_floor_vaginal_artery"},
	  {display: "Middle Rectal Artery ", value: "gu_pelvic_floor_middle_rectal_artery"},
	  {display: "Uterine Artery", value: "gu_pelvic_floor_uterine_artery"},
	  {display: "Anal Triangle", value: "gu_pelvic_floor_anal_triangle"},
	  {display: "Perineal Membrane", value: "gu_pelvic_floor_perineal_membrane"},
	  {display: "Superficial Perineal Pouch", value: "gu_pelvic_floor_superficial_perineal_pouch"},
	  {display: "Deep Perineal Pouch", value: "gu_pelvic_floor_deep_perineal_pouch"},
	  {display: "Colles' Fascia", value: "gu_pelvic_floor_colles_fascia"},
	  {display: "Ischiocavernosus Muscle", value: "gu_pelvic_floor_ischiocavernosus_muscle"},
	  {display: "Bulbospongiosus Muscle", value: "gu_pelvic_floor_bulbospongiosus_muscle"},
	  {display: "Superficial Transverse Perineii Muscle", value: "gu_pelvic_floor_superficial_transverse_perineii_muscle"},
	  {display: "Scrotum", value: "gu_pelvic_floor_scrotum"},
	  {display: "Crus of Penis", value: "gu_pelvic_floor_crus_of_penis"},
	  {display: "Bulb of Penis", value: "gu_pelvic_floor_bulb_of_penis"},
	  {display: "Glans", value: "gu_pelvic_floor_glans"},
	  {display: "Corpus Cavernosum", value: "gu_pelvic_floor_corpus_cavernosum"},
	  {display: "Corpus Spongiosum", value: "gu_pelvic_floor_corpus_spongiosum"},
	  {display: "Urethra in Corpus Spongiosum", value: "gu_pelvic_floor_urethra_in_corpus_spongiosum"},
	  {display: "Bulb of Vestibule", value: "gu_pelvic_floor_bulb_of_vestibule"},
	  {display: "Greater Vestibular Gland", value: "gu_pelvic_floor_greater_vestibular_gland"},
	  {display: "Clitoris", value: "gu_pelvic_floor_clitoris"},
	  {display: "Glans Clitoris", value: "gu_pelvic_floor_glans_clitoris"},
	  {display: "Internal Pudendal Artery", value: "gu_pelvic_floor_internal_pudendal_artery"},
	  {display: "Pudendal Nerve", value: "gu_pelvic_floor_pudendal_nerve"}
    ];
	
	var specific_gu_pelvis_with_viscera_regions = [
	  {display: "Urinary Bladder", value: "gu_pelvis_with_viscera_urinary_bladder"},
	  {display: "Rectum", value: "gu_pelvis_with_viscera_rectum"}, 
	  {display: "Seminal Vesicles", value: "gu_pelvis_with_viscera_seminal_vesicles"},
	  {display: "Ductus Deferens", value: "gu_pelvis_with_viscera_ductus_deferens"},
	  {display: "Ampulla of Ductus Deferens", value: "gu_pelvis_with_viscera_ampulla_of_ductus_deferens"}, 
	  {display: "Prostate", value: "gu_pelvis_with_viscera_prostate"},
	  {display: "Right Testicular Artery", value: "gu_pelvis_with_viscera_right_testicular_artery"},
	  {display: "Left Testicular Artery", value: "gu_pelvis_with_viscera_left_testicular_artery"}, 
	  {display: "Right Testicular Vein", value: "gu_pelvis_with_viscera_right_testicular_vein"},
	  {display: "Left Testicular Vein", value: "gu_pelvis_with_viscera_left_testicular_vein"},
	  {display: "Superficial Inguinal Ring", value: "gu_pelvis_with_viscera_superficial_inguinal_ring"}, 
	  {display: "Deep Inguinal Ring", value: "gu_pelvis_with_viscera_deep_inguinal_ring"},
	  {display: "Walls of Inguinal Canal", value: "gu_pelvis_with_viscera_walls_of_inguinal_canal"},
	  {display: "Spermatic Cord", value: "gu_pelvis_with_viscera_spermatic_cord"}, 
	  {display: "Dartos mMscle", value: "gu_pelvis_with_viscera_dartos_muscle"},
	  {display: "External Spermatic Fascia", value: "gu_pelvis_with_viscera_external_spermatic_fascia"},
	  {display: "Cremaster Muscle / Fascia", value: "gu_pelvis_with_viscera_cremaster_muscle_fascia"}, 
	  {display: "Internal Spermatic Fascia", value: "gu_pelvis_with_viscera_internal_spermatic_fascia"},
	  {display: "Ductus (vas) Deferens", value: "gu_pelvis_with_viscera_ductus_vas_deferens"},
	  {display: "Testicular Artery", value: "gu_pelvis_with_viscera_testicular_artery"}, 
	  {display: "Pampiniform Plexux of Veins", value: "gu_pelvis_with_viscera_pampiniform_plexux_of_veins"},
	  {display: "Tunica Vaginalis", value: "gu_pelvis_with_viscera_tunica_vaginalis"},
	  {display: "Epididymis", value: "gu_pelvis_with_viscera_epididymis"}, 
	  {display: "Testis", value: "gu_pelvis_with_viscera_testis"},
	  {display: "Perineal Membrane", value: "gu_pelvis_with_viscera_perineal_membrane"},
	  {display: "Scrotum", value: "gu_pelvis_with_viscera_scrotum"}, 
	  {display: "Urethra", value: "gu_pelvis_with_viscera_urethra"},
	  {display: "Uterus", value: "gu_pelvis_with_viscera_uterus"},
	  {display: "Urinary bladder", value: "gu_pelvis_with_viscera_urinary_bladder"}, 
	  {display: "Broad Ligament", value: "gu_pelvis_with_viscera_broad_ligament"},
	  {display: "Uterine Tube", value: "gu_pelvis_with_viscera_uterine_tube"}, 
	  {display: "Mesometrium", value: "gu_pelvis_with_viscera_mesometrium"},
	  {display: "Mesovarium", value: "gu_pelvis_with_viscera_mesovarium"},
	  {display: "Mesosalpinyx", value: "gu_pelvis_with_viscera_mesosalpinyx"}, 
	  {display: "Ovary", value: "gu_pelvis_with_viscera_ovary"},
	  {display: "Ovarian Fossa", value: "gu_pelvis_with_viscera_ovarian_fossa"},
	  {display: "Obturator Nerve", value: "gu_pelvis_with_viscera_obturator_nerve"}, 
	  {display: "Suspensory Ligament of Ovary", value: "gu_pelvis_with_viscera_suspensory_ligament_of_ovary"},
	  {display: "Ligament of Ovary", value: "gu_pelvis_with_viscera_ligament_of_ovary"},
	  {display: "Round Ligament of Uterus", value: "gu_pelvis_with_viscera_round_ligament_of_uterus"}, 
	  {display: "Ovarian Artery", value: "gu_pelvis_with_viscera_ovarian_artery"},
	  {display: "Uterine Artery (Crossed by Ureter)", value: "gu_pelvis_with_viscera_uterine_artery_crossed_by_ureter"},
	  {display: "Uterus", value: "gu_pelvis_with_viscera_uterus"}, 
	  {display: "Vaginal Fornices", value: "gu_pelvis_with_viscera_vaginal_fornices"},
	  {display: "Kidney", value: "gu_pelvis_with_viscera_kidney"}, 
	  {display: "Suprarenal Gland", value: "gu_pelvis_with_viscera_suprarenal_gland"},
	  {display: "Ureters", value: "gu_pelvis_with_viscera_ureters"},
	  {display: "Renal Vein ", value: "gu_pelvis_with_viscera_renal_vein"}, 
	  {display: "Anus", value: "gu_pelvis_with_viscera_anus"}
    ];
	
	var specific_gu_pelvic_organs_regions = [
	  {display: "Kidney", value: "gu_pelvic_organs_kidney"},
	  {display: "Uterus", value: "gu_pelvic_organs_uterus"}
    ];
	
	var specific_tx_anterior_wall_regions = [
	  {display: "External Intercostal Muscle", value: "tx_anterior_wall_external_intercostal_muscle"},
	  {display: "Internal Intercostal Muscle", value: "tx_anterior_wall_internal_intercostal_muscle"},
	  {display: "Innermost Intercostal Muscle", value: "tx_anterior_wall_innermost_intercostal_muscle"},
	  {display: "Intercostal Vein", value: "tx_anterior_wall_intercostal_vein"},
	  {display: "Intercostal Artery", value: "tx_anterior_wall_intercostal_artery"},
	  {display: "Internal Thoracic Artery", value: "tx_anterior_wall_intercostal_thoracic_artery"},
	  {display: "Intercostal Nerve", value: "tx_anterior_wall_intercostal_nerve"}
    ];
	
	var specific_tx_posterior_wall_regions = [
	  {display: "Sympathetic Chain", value: "tx_posterior_wall_sympathetic_chain"},
	  {display: "Azygos Vein", value: "tx_posterior_wall_azygos_vein"},
	  {display: "Hemiazygos Veins", value: "tx_posterior_wall_hemiazygos_vein"},
	  {display: "Intercostal Vein", value: "tx_posterior_wall_intercostal_vein"},
	  {display: "Intercostal Artery", value: "tx_posterior_wall_intercostal_artery"},
	  {display: "Intercostal Nerve", value: "tx_posterior_wall_intercostal_nerve"},
	  {display: "Great Vessels", value: "tx_posterior_wall_great_vessels"},
	  {display: "Intercostal Muscles", value: "tx_posterior_wall_intercostal_muscles"}
    ];
	
	var specific_tx_thorax_with_viscera_regions = [
	  {display: "Heart", value: "tx_thorax_with_viscera_heart"},
	  {display: "Aorta Ascending", value: "tx_thorax_with_viscera_aorta_ascending"},
	  {display: "Aorta Arch", value: "tx_thorax_with_viscera_aorta_arch"},
	  {display: "Aorta Descending", value: "tx_thorax_with_viscera_aorta_descending"},
	  {display: "Oesophagus", value: "tx_thorax_with_viscera_oesophagus"},
	  {display: "Trachea", value: "tx_thorax_with_viscera_trachea"},
	  {display: "Lungs", value: "tx_thorax_with_viscera_lungs"},
	  {display: "Brachiocephalic Artery", value: "tx_thorax_with_viscera_brachiocephalic_artery"},
	  {display: "Subclavian Artery", value: "tx_thorax_with_viscera_subclavian_artery"},
	  {display: "Carotid Arteries", value: "tx_thorax_with_viscera_carotid_arteries"},
	  {display: "Bronchial Arteries", value: "tx_thorax_with_viscera_bronchial_arteries"},
	  {display: "Posterior Intercostals Arteries", value: "tx_thorax_with_viscera_posterior_intercostals_arteries"},
	  {display: "Pulmonary Trunk and Arteries", value: "tx_thorax_with_viscera_pulmonary_trunk_and_arteries"},
	  {display: "External Jugular Vein", value: "tx_thorax_with_viscera_external_jugular_vein"},
	  {display: "Internal Jugular Vein", value: "tx_thorax_with_viscera_internal_jugular_vein"},
	  {display: "Subclavian Vein", value: "tx_thorax_with_viscera_subclavian_vein"},
	  {display: "Brachiocephalic Vein", value: "tx_thorax_with_viscera_brachiocephalic_vein"},
	  {display: "Superior Vena Cava", value: "tx_thorax_with_viscera_superior_vena_cava"},
	  {display: "Inferior Vena Cava", value: "tx_thorax_with_viscera_inferior_vena_cava"},
	  {display: "Thoracic Duct", value: "tx_thorax_with_viscera_thoracic_duct"},
	  {display: "Phrenic Nerves", value: "tx_thorax_with_viscera_phrenic_nerves"},
	  {display: "Left Vagus Nerve", value: "tx_thorax_with_viscera_left_vagus_nerve"},
	  {display: "Right Vagus Nerve", value: "tx_thorax_with_viscera_right_vagus_nerve"},
	  {display: "Right Recurrent Laryngeal Nerve", value: "tx_thorax_with_viscera_right_recurrent_laryngeal_nerve"},
	  {display: "Left Recurrent Laryngeal Nerve", value: "tx_thorax_with_viscera_left_recurrent_laryngeal_nerve"},
	  {display: "Diaphragm", value: "tx_thorax_with_viscera_diaphragm"}
    ];
	
	var specific_tx_thorax_no_viscera_regions = [
	  {display: "Diaphragm", value: "tx_thorax_no_viscera_diaphragm"},
	  {display: "Phrenic Nerves", value: "tx_thorax_no_viscera_phrenic_nerves"},
	  {display: "Left Vagus Nerve", value: "tx_thorax_no_viscera_left_vagus_nerve"},
	  {display: "Right Vagus Nerve", value: "tx_thorax_no_viscera_right_vagus_nerve"},
	  {display: "Right Recurrent Laryngeal Nerve", value: "tx_thorax_no_viscera_right_recurrent_laryngeal_nerve"},
	  {display: "Left Recurrent Laryngeal Nerve", value: "tx_thorax_no_viscera_left_recurrent_laryngeal_nerve"},
	  {display: "Heart", value: "tx_thorax_no_viscera_heart"},
	  {display: "Oesphagus", value: "tx_thorax_no_viscera_oesphagus"},
	  {display: "Aorta", value: "tx_thorax_no_viscera_aorta"},
	  {display: "Thoracic Duct", value: "tx_thorax_no_viscera_thoracic_duct"},
	  {display: "Vena Cava", value: "tx_thorax_no_viscera_vena_cava"},
	  {display: "Splanchnic Nerves", value: "tx_thorax_no_viscera_splanchnic_nerves"}
	 ];
	
	var specific_tx_thoracic_organs_regions = [
	  {display: "Heart with Pericardium", value: "tx_thoracic_organs_heart_with_pericardium"},
	  {display: "Heart with Coronary Vessels", value: "tx_thoracic_organs_heart_with_coronary_vessels"}, 
	  {display: "Intact Heart", value: "tx_thoracic_organs_intact_heart"},
	  {display: "Open Heart", value: "tx_thoracic_organs_open_heart"},
	  {display: "Heart with Major Vessels", value: "tx_thoracic_organs_heart_with_major_vessels"},
	  {display: "Pair of Lungs", value: "tx_thoracic_organs_pair_of_lungs"},
	  {display: "Left Lung", value: "tx_thoracic_organs_left_lung"},
	  {display: "Right Lung", value: "tx_thoracic_organs_right_lung"},
	  {display: "Lung with Hilum", value: "tx_thoracic_organs_lung_with_hilum"},
	  {display: "Trachea with Larynx", value: "tx_thoracic_organs_trachea_with_larynx"}
    ];
	
	var specific_ab_anterior_wall_regions = [
	  {display: "Linea Alba", value: "ab_anterior_wall_linea_alba"},
	  {display: "Rectus Sheath", value: "ab_anterior_wall_rectus_sheath"},
	  {display: "Tendinous Intersections", value: "ab_anterior_wall_tendinous_intersections"},
	  {display: "Lower Intercostal Nerves", value: "ab_anterior_wall_lower_intercostal_nerves"},
	  {display: "Epigastric Arteries", value: "ab_anterior_wall_epigastric_arteries"},
	  {display: "Epigastric Veins", value: "ab_anterior_wall_epigastric_veins"},
	  {display: "External Oblique", value: "ab_anterior_wall_external_oblique"},
	  {display: "Internal Oblique", value: "ab_anterior_wall_internal_oblique"},
	  {display: "Transversus Abdominis", value: "ab_anterior_wall_transversus_abdominis"},
	  {display: "Inguinal Ligament", value: "ab_anterior_wall_inguinal_ligament"},
	  {display: "Superficial Inguinal Ring", value: "ab_anterior_wall_superficial_inguinal_ring"},
	  {display: "Spermatic Cord", value: "ab_anterior_wall_spermatic_cord"},
	  {display: "Round Ligament of the Uterus", value: "ab_anterior_wall_round_ligament_of_the_uterus"},
	  {display: "Conjoint Tendon", value: "ab_anterior_wall_conjoint_tendon"},
	  {display: "Deep Inguinal Ring", value: "ab_anterior_wall_deep_inguinal_ring"},
	  {display: "Inguinal Canal Disseccted", value: "ab_anterior_wall_inguinal_canal_disseccted"}
    ];
	
	var specific_ab_abdonimal_organs = [
	  {display: "Stomach", value: "ab_abdonimal_organs_stomach"},
	  {display: "Liver", value: "ab_abdonimal_organs_liver"},
	  {display: "Gallbladder", value: "ab_abdonimal_organs_gallbladder"},
	  {display: "Pancreas", value: "ab_abdonimal_organs_pancreas"},
	  {display: "Spleen", value: "ab_abdonimal_organs_spleen"},
	  {display: "Intestines", value: "ab_abdonimal_organs_intestines"},
	  {display: "Kidneys", value: "ab_abdonimal_organs_kidneys"},
	  {display: "Other", value: "ab_abdonimal_organs_other"}
	 ];
	
	var specific_ab_posterior_wall_regions = [
	  {display: "Suprarenal Glands", value: "ab_posterior_wall_suprarenal_glands"},
	  {display: "Superior Suprarenal Artery", value: "ab_posterior_wall_superior_suprarenal_artery"},
	  {display: "middle suprarenal Artery", value: "ab_posterior_wall_middle_suprarenal_artery"},
	  {display: "Inferior Suprarenal Artery", value: "ab_posterior_wall_inferior_suprarenal_artery"},
	  {display: "Abdominal Aorta", value: "ab_posterior_wall_abdominal_aorta"},
	  {display: "Coelic Trunk", value: "ab_posterior_wall_coelic_trunk"},
	  {display: "Superior Mesenteric Artery", value: "ab_posterior_wall_superior_mesenteric_artery"},
	  {display: "Inferior Mesenteric Artery", value: "ab_posterior_wall_inferior_mesenteric_artery"},
	  {display: "Inferior Phrenic Arteries", value: "ab_posterior_wall_inferior_phrenic_arteries"},
	  {display: "Renal Arteries", value: "ab_posterior_wall_renal_arteries"},
	  {display: "Testicular Arteries", value: "ab_posterior_wall_testicular_arteries"},
	  {display: "Ovarian Arteries", value: "ab_posterior_wall_ovarian_arteries"},
	  {display: "Lumbar Arteries", value: "ab_posterior_wall_lumbar_arteries"},
	  {display: "Right Common Iliac Artery", value: "ab_posterior_wall_right_common_iliac_artery"},
	  {display: "Left Common Iliac Vein", value: "ab_posterior_wall_left_common_iliac_vein"},
	  {display: "Inferior Vena Cava", value: "ab_posterior_wall_inferior_vena_cava"},
	  {display: "Renal Veins", value: "ab_posterior_wall_renal_veins"},
	  {display: "Common Iliac Veins", value: "ab_posterior_wall_common_iliac_veins"},
	  {display: "Testicular Veins", value: "ab_posterior_wall_testicular_veins"},
	  {display: "Ovarian Veins", value: "ab_posterior_wall_ovarian_veins"},
	  {display: "Suprarenal Veins", value: "ab_posterior_wall_suprarenal_veins"},
	  {display: "Phrenic Veins", value: "ab_posterior_wall_phrenic_veins"},
	  {display: "Hepatic Veins", value: "ab_posterior_wall_hepatic_veins"},
	  {display: "Lumbar Veins", value: "ab_posterior_wall_lumbar_veins"},
	  {display: "Psoas", value: "ab_posterior_wall_psoas"},
	  {display: "Iliacus", value: "ab_posterior_wall_iliacus"},
	  {display: "Quadratus Lumborum", value: "ab_posterior_wall_quadratus_lumborum"},
	  {display: "Ileohypogastric Nerve", value: "ab_posterior_wall_ileohypogastric_nerve"},
	  {display: "Genitofemoral Nerve", value: "ab_posterior_wall_genitofemoral_nerve"},
	  {display: "Femoral Nerve", value: "ab_posterior_wall_femoral_nerve"},
	  {display: "Ureter", value: "ab_posterior_wall_ureter"},
	  {display: "Kidneys", value: "ab_posterior_wall_kidneys"},
	  {display: "Rectum", value: "ab_posterior_wall_rectum"},
	  {display: "Rectum Hemisected", value: "ab_posterior_wall_rectum_hemisected"},
	  {display: "Anus", value: "ab_posterior_wall_anus"},
	  {display: "Anus Hemisected", value: "ab_posterior_wall_anus_hemisected"}
    ];
	
	var specific_ab_abdomen_with_viscera_regions = [
	  {display: "Oesophagus", value: "ab_abdomen_with_viscera_oesophagus"},
	  {display: "Stomach", value: "ab_abdomen_with_viscera_stomach"},
	  {display: "Lesser Omentum", value: "ab_abdomen_with_viscera_lesser_omentum"},
	  {display: "Liver", value: "ab_abdomen_with_viscera_liver"},
	  {display: "Porta Hepatic", value: "ab_abdomen_with_viscera_porta_hepatic"},
	  {display: "Ligamentum Teres", value: "ab_abdomen_with_viscera_ligamentum_teres"},
	  {display: "Ligamentum Venosum", value: "ab_abdomen_with_viscera_ligamentum_venosum"},
	  {display: "Gall Bladder", value: "ab_abdomen_with_viscera_gall_bladder"},
	  {display: "Inferior Vena Cava", value: "ab_abdomen_with_viscera_inferior_vena_cava"},
	  {display: "Hepatic Veins", value: "ab_abdomen_with_viscera_hepatic_veins"},
	  {display: "Falciform Ligament", value: "ab_abdomen_with_viscera_falciform_ligament"},
	  {display: "Common Hepatic Duct", value: "ab_abdomen_with_viscera_common_hepatic_duct"},
	  {display: "Cystic Duct", value: "ab_abdomen_with_viscera_cystic_duct"},
	  {display: "Jejunum", value: "ab_abdomen_with_viscera_jejunum"},
	  {display: "Ileum", value: "ab_abdomen_with_viscera_ileum"},
	  {display: "Caecum", value: "ab_abdomen_with_viscera_caecum"},
	  {display: "Ileocaecal Opening", value: "ab_abdomen_with_viscera_ileocaecal_opening"},
	  {display: "Ileocaecal Valve", value: "ab_abdomen_with_viscera_ileocaecal_valve"},
	  {display: "Appendix", value: "ab_abdomen_with_viscera_appendix"},
	  {display: "Retrocaecal Recess", value: "ab_abdomen_with_viscera_retrocaecal_recess"},
	  {display: "Ascending Colon", value: "ab_abdomen_with_viscera_ascending_colon"},
	  {display: "Transverse Colon", value: "ab_abdomen_with_viscera_transverse_colon"},
	  {display: "Descending Colon", value: "ab_abdomen_with_viscera_descending_colon"},
	  {display: "Sigmoid Colon", value: "ab_abdomen_with_viscera_sigmoid_colon"},
	  {display: "Rectum", value: "ab_abdomen_with_viscera_rectum"},
	  {display: "Taeniae Coli", value: "ab_abdomen_with_viscera_taeniae_coli"},
	  {display: "Superior Mesenteric Artery", value: "ab_abdomen_with_viscera_superior_mesenteric_artery"},
	  {display: "Intestinal Arteries", value: "ab_abdomen_with_viscera_intestinal_arteries"},
	  {display: "Ileocolic Artery", value: "ab_abdomen_with_viscera_ileocolic_artery"},
	  {display: "Right Colic Artery", value: "ab_abdomen_with_viscera_right_colic_artery"},
	  {display: "Middle Colic", value: "ab_abdomen_with_viscera_middle_colic"},
	  {display: "Inferior Mesenteric Artery", value: "ab_abdomen_with_viscera_inferior_mesenteric_artery"},
	  {display: "Left Colic Artery", value: "ab_abdomen_with_viscera_left_colic_artery"},
	  {display: "Super Rectal Artery", value: "ab_abdomen_with_viscera_super_rectal_artery"},
	  {display: "Sigmoid Artery", value: "ab_abdomen_with_viscera_sigmoid_artery"},
	  {display: "Marginal Artery", value: "ab_abdomen_with_viscera_marginal_artery"},
	  {display: "Celiac Trunk", value: "ab_abdomen_with_viscera_celiac_trunk"},
	  {display: "Gastric Arteries", value: "ab_abdomen_with_viscera_gastric_arteries"},
	  {display: "Splenic Artery", value: "ab_abdomen_with_viscera_splenic_artery"},
	  {display: "Gastroepiploic Arteries", value: "ab_abdomen_with_viscera_gastroepiploic_arteries"},
	  {display: "Hepatic Arteries", value: "ab_abdomen_with_viscera_hepatic_arteries"},
	  {display: "Cystic Artery", value: "ab_abdomen_with_viscera_cystic_artery"},
	  {display: "gGstroduodenal Artery", value: "ab_abdomen_with_viscera_gastroduodenal_artery"},
	  {display: "Celiac Plexus", value: "ab_abdomen_with_viscera_celiac_plexus"},
	  {display: "Duodenum Full", value: "ab_abdomen_with_viscera_duodenum_full"},
	  {display: "Duodenum Partial", value: "ab_abdomen_with_viscera_duodenum partial"},
	  {display: "Major Pancreatic Duct", value: "ab_abdomen_with_viscera_major_pancreatic_duct"}, 
	  {display: "Hepatopancreatic Ampulla", value: "ab_abdomen_with_viscera_hepatopancreatic_ampulla"}, 
	  {display: "Major Duodenal Papilla", value: "ab_abdomen_with_viscera_major_duodenal_papilla"}, 
	  {display: "Pancreas", value: "ab_abdomen_with_viscera_pancreas"}, 
	  {display: "Pancreas with Duct", value: "ab_abdomen_with_viscera_pancreas_with_duct"}, 
	  {display: "Spleen", value: "ab_abdomen_with_viscera_spleen"}, 
	  {display: "Hilum of Spleen", value: "ab_abdomen_with_viscera_hilum_of_spleen"}, 
    ];
	
	var specific_head_and_neck_face_superficial_regions = [
	  {display: "Muscles of Facial Expression", value: "head_and_neck_face_superficial_muscles_of_facial_expression"},
	  {display: "Facial Artery", value: "head_and_neck_face_superficial_facial_artery"},
	  {display: "Facial Vein", value: "head_and_neck_face_superficial_facial_vein"},
	  {display: "External Jugular Vein", value: "head_and_neck_face_superficial_external_jugular_vein"},
	  {display: "Parotid Gland", value: "head_and_neck_face_superficial_parotid_gland"},
	  {display: "Parotid Duct", value: "head_and_neck_face_superficial_parotid_duct"},
	  {display: "Facial Nerve and Branches", value: "head_and_neck_face_superficial_facial_nerve_and_branches"},
	  {display: "Superficial Temporal Artery", value: "head_and_neck_face_superficial_superficial_temporal_artery"},
	  {display: "Superficial Temporal Vein", value: "head_and_neck_face_superficial_superficial_temporal_vein"},
	  {display: "Retromandibular Vein", value: "head_and_neck_face_superficial_retromandibular_vein"}
    ];
	
	var specific_head_and_neck_face_deep_regions = [
	  {display: "Temporalis", value: "head_and_neck_face_deep_temporalis"},
	  {display: "Masseter", value: "head_and_neck_face_deep_masseter"},
	  {display: "Lateral Pterygoid", value: "head_and_neck_face_deep_lateral_pterygoid"},
	  {display: "Medial Pterygoid", value: "head_and_neck_face_deep_medial_pterygoid"},
	  {display: "Buccinator", value: "head_and_neck_face_deep_buccinator"},
	  {display: "Contents of Infratemporal Fossa", value: "head_and_neck_face_deep_contents_of_infratemporal_fossa"},
	  {display: "Trigeminal Nerve and Branches", value: "head_and_neck_face_deep_trigeminal_nerve_and_branches"},
	  {display: "Maxilary Artery", value: "head_and_neck_face_deep_maxilary_artery"},
	  {display: "Maxillary Vein", value: "head_and_neck_face_deep_maxillary_vein"},
	  {display: "TMJ", value: "head_and_neck_face_deep_tmj"}
	 ];
	 
	 var specific_head_and_neck_neck_regions = [
	  {display: "Larynx", value: "head_and_neck_neck_larynx"},
	  {display: "Trachea", value: "head_and_neck_neck_trachea"},
	  {display: "Hyoid", value: "head_and_neck_neck_hyoid"},
	  {display: "Sternoclavicular Joint", value: "head_and_neck_neck_sternoclavicular_joint"},
	  {display: "Sternocleidomastoid", value: "head_and_neck_neck_sternocleidomastoid"},
	  {display: "Omohyoid", value: "head_and_neck_neck_omohyoid"},
	  {display: "Thyrohyoid", value: "head_and_neck_neck_thyrohyoid"},
	  {display: "Sternohyoid", value: "head_and_neck_neck_sternohyoid"},
	  {display: "Sternothyroid", value: "head_and_neck_neck_sternothyroid"},
	  {display: "Digastric", value: "head_and_neck_neck_digastric"},
	  {display: "Stylohyoid", value: "head_and_neck_neck_stylohyoid"},
	  {display: "Geniohyoid", value: "head_and_neck_neck_geniohyoid"},
	  {display: "Mylohyoid", value: "head_and_neck_neck_mylohyoid"},
	  {display: "Lingual Frenulum", value: "head_and_neck_neck_lingual_frenulum"},
	  {display: "Submandibular Gland", value: "head_and_neck_neck_submandibular_gland"},
	  {display: "Facial Nerve", value: "head_and_neck_neck_facial_nerve"},
	  {display: "Sublingual Gland", value: "head_and_neck_neck_sublingual_gland"},
	  {display: "Common Carotid", value: "head_and_neck_neck_common_carotid"},
	  {display: "Superficial Temporal Artery", value: "head_and_neck_neck_superficial_temporal_artery"},
	  {display: "Maxillary Artery", value: "head_and_neck_neck_maxillary_artery"},
	  {display: "Facial Artery", value: "head_and_neck_neck_facial_artery"},
	  {display: "Occipital Artery", value: "head_and_neck_neck_occipital_artery"},
	  {display: "Lingual Artery", value: "head_and_neck_neck_lingual_artery"},
	  {display: "Superior Thyroid Artery", value: "head_and_neck_neck_superior_thyroid_artery"},
	  {display: "Vertrebral Artery", value: "head_and_neck_neck_vertrebral_artery"},
	  {display: "Subclavian Artery", value: "head_and_neck_neck_subclavian_artery"},
	  {display: "Internal Carotid", value: "head_and_neck_neck_internal_carotid"},
	  {display: "Internal Jugular", value: "head_and_neck_neck_internal_jugular"},
	  {display: "External Jugular", value: "head_and_neck_neck_external_jugular"},
	  {display: "Right Brachiocephalic Vein", value: "head_and_neck_neck_right_brachiocephalic_vein"},
	  {display: "Left Brachiocephalic Vein", value: "head_and_neck_neck_left_brachiocephalic_vein"},
	  {display: "Subclavian Vein", value: "head_and_neck_neck_subclavian_vein"},
	  {display: "Left Recurrent Laryngeal Nerve", value: "head_and_neck_neck_left_recurrent_laryngeal_nerve"},
	  {display: "Right Recurrent Laryngeal Nerve", value: "head_and_neck_neck_right_recurrent_laryngeal_nerve"},
	  {display: "Brachial Plexus Roots", value: "head_and_neck_neck_brachial_plexus_roots"},
	  {display: "Phrenic Nerve", value: "head_and_neck_neck_phrenic_nerve"},
	  {display: "CN I", value: "head_and_neck_neck_cn_I"},
	  {display: "CN II", value: "head_and_neck_neck_cn_II"},
	  {display: "CN III", value: "head_and_neck_neck_cn_III"},
	  {display: "CN IV", value: "head_and_neck_neck_cn_IV"},
	  {display: "CN V", value: "head_and_neck_neck_cn_V"},
	  {display: "CN VI", value: "head_and_neck_neck_cn_VI"},
	  {display: "CN VII", value: "head_and_neck_neck_cn_VII"},
	  {display: "CN VIII", value: "head_and_neck_neck_cn_VIII"},
	  {display: "CN IX", value: "head_and_neck_neck_cn_IX"},
	  {display: "CN X", value: "head_and_neck_neck_cn_X"},
	  {display: "CN XI", value: "head_and_neck_neck_cn_XI"},
	  {display: "CN XII", value: "head_and_neck_neck_cn_XII"}
	 ];
	 
	 var specific_head_and_neck_oral_and_nasal_cavity_regions = [
	  {display: "Superior Choanae", value: "head_and_neck_oral_and_nasal_cavity_superior_chonae"},
	  {display: "Middle Choanae", value: "head_and_neck_oral_and_nasal_cavity_middle_chonae"},
	  {display: "Inferior Chonae", value: "head_and_neck_oral_and_nasal_cavity_inferior_chonae"},
	  {display: "Ethmoidal Cells", value: "head_and_neck_oral_and_nasal_cavity_ethmoidal_cells"},
	  {display: "Sphenoidal Sinus", value: "head_and_neck_oral_and_nasal_cavity_sphenoidal_sinus"},
	  {display: "Maxillary Sinus", value: "head_and_neck_oral_and_nasal_cavity_maxillary_sinus"},
	  {display: "Frontal Sinus", value: "head_and_neck_oral_and_nasal_cavity_frontal_sinus"},
	  {display: "Constrictor Muscles", value: "head_and_neck_oral_and_nasal_cavity_constrictor_muscles"},
	  {display: "Pharyngeal Arches", value: "head_and_neck_oral_and_nasal_cavity_pharyngeal_arches"},
	  {display: "Stylopharyngeus", value: "head_and_neck_oral_and_nasal_cavity_stylopharyngeus"},
	  {display: "Palatopharyngeus", value: "head_and_neck_oral_and_nasal_cavity_palatopharyngeus"},
	  {display: "Salpingopharyngeus", value: "head_and_neck_oral_and_nasal_cavity_salpingopharyngeus"},
	  {display: "Adenoids", value: "head_and_neck_oral_and_nasal_cavity_adenoids"},
	  {display: "Opening of Auditory Tube", value: "head_and_neck_oral_and_nasal_cavity_opening_of_auditory_tube"},
	  {display: "Larynx", value: "head_and_neck_oral_and_nasal_cavity_larynx"},
	  {display: "Bisected Larynx", value: "head_and_neck_oral_and_nasal_cavity_bisected_larynx"},
	  {display: "Cartilages of the Larynx", value: "head_and_neck_oral_and_nasal_cavity_cartilages_of_the_larynx"},
	  {display: "Epiglottis", value: "head_and_neck_oral_and_nasal_cavity_epiglottis"},
	  {display: "Piriform Fossa", value: "head_and_neck_oral_and_nasal_cavity_piriform_fossa"},
	  {display: "Vocal Fold", value: "head_and_neck_oral_and_nasal_cavity_vocal_fold"},
	  {display: "Vestibular Fold", value: "head_and_neck_oral_and_nasal_cavity_vestibular_fold"},
	  {display: "Trachea", value: "head_and_neck_oral_and_nasal_cavity_trachea"},
	  {display: "Intrinsic Muscles", value: "head_and_neck_oral_and_nasal_cavity_intrinsic_muscles"}
	 ];
	 
	 var specific_back_superficial_regions = [
	  {display: "Trapezius", value: "back_superficial_trapezius"},
	  {display: "Latissimus Dorsi", value: "back_superficial_latissimus_dorsi"},
	  {display: "Levator Scapulae", value: "back_superficial_levator_scapulae"},
	  {display: "Rhomboid Minor", value: "back_superficial_rhomboid_minor"},
	  {display: "Rhomboid major", value: "back_superficial_rhomboid_major"},
	  {display: "Spinal Accessory XI", value: "back_superficial_spinal_accessory_XI"},
	  {display: "Thoracodorsal", value: "back_superficial_thoracodorsal"},
	  {display: "Dorsal Scapular Nerve", value: "back_superficial_dorsal_scapular_nerve"}
	 ];
	 
	 var specific_back_intermediate_regions = [
	  {display: "Serratus Posterior Superior", value: "back_intermediate_serratus_posterior_superior"},
	  {display: "Serratus Posterior Inferior", value: "back_intermediate_serratus_posterior_inferior"},
	  {display: "Levatores Costarum", value: "back_intermediate_levatores_costarum "},
	  {display: "Intercostal Nerve", value: "back_intermediate_intercostal_nerve"}
	 ];
	 
	 var specific_back_deep_regions = [
	  {display: "Iliocostalis", value: "back_deep_iliocostalis"},
	  {display: "Longissimus", value: "back_deep_longissimus"},
	  {display: "Spinalis Thoracis", value: "back_deep_spinalis_thoracis"},
	  {display: "Semispinalis", value: "back_deep_semispinalis"}, 
	  {display: "Multifidus", value: "back_deep_multifidus"}, 
	  {display: "Rotatores", value: "back_deep_rotatores"}, 
	  {display: "Interspinales", value: "back_deep_interspinales"}, 
	  {display: "Intertransversarii", value: "back_deep_intertransversarii"} 
	 ];
	 
	 var specific_back_back_of_neck_regions = [
	  {display: "Trapezius", value: "back_back_of_neck_trapezius"},
	  {display: "Levator Scapulae", value: "back_back_of_neck_levator_scapulae"},
	  {display: "Semispinalis Capitis", value: "back_back_of_neck_semispinalis_capitis"},
	  {display: "Splenius Capitis", value: "back_back_of_neck_splenius_capitis"},
	  {display: "Longissimus Capitis", value: "back_back_of_neck_longissimus_capitis"},
	  {display: "Rectus Capitis Posterior Minor", value: "back_back_of_neck_rectus_capitis_posterior_minor"},
	  {display: "Rectus Capitis Posterior Major", value: "back_back_of_neck_rectus_capitis_posterior_major"},
	  {display: "Oblique Capitis Superior", value: "back_back_of_neck_oblique_capitis_superior "},
	  {display: "Oblique Capitis Inferior", value: "back_back_of_neck_oblique_capitis_inferior"},
	  {display: "Spinalis Cervicis", value: "back_back_of_neck_spinalis_cervicis"},
	  {display: "Rotatores Cervicis", value: "back_back_of_neck_rotatores_cervicis"}
	 ];
	 
	  var specific_neuro_regions = [
	  {display: "Not Applicable", value: "not_applicable", selected: "selected"},
	  ]
	
// ************************************************************************************************************************************************************//
//function to populate child select box >> FOR THE REGION SELECT BOX >>>>>>>>>>>>>>>>>>>>>>> FIRST SELECTION ROW
function list(array_list)
{
  $("#prosection_region").html(""); //reset child options
  $(array_list).each(function (i) { //populate child options 
	  $("#prosection_region").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
  });
}	
//function to populate child select box >> FOR THE REGION SPECIFIC SELECT BOX
function list_1(array_list_1)
{
  $("#prosection_region_specific").html(""); //reset child options
  $(array_list_1).each(function (i) { //populate child options 
  	   console.log(this.value);
	   var inArrayOrNot = $.inArray(this.value, php_feature_specific_array_1);
	   console.log(inArrayOrNot);
	   if(inArrayOrNot != -1) {
			$("#prosection_region_specific").append("<option selected='selected' value=\""+array_list_1[i].value+"\">"+array_list_1[i].display+"</option>");
		} else {
			$("#prosection_region_specific").append("<option value=\""+array_list_1[i].value+"\">"+array_list_1[i].display+"</option>");
		}
	  $('#prosection_region_specific').multipleSelect('refresh');
  });
}

// Change function: populate the region select box when type of prosection select box option is chosen
$("#type_of_prosection").change(function() {
    var parent = $(this).val(); 
    switch(parent){ 
        case 'ul':
				 $("#prosection_region").html(""); //reset child options
				list(ul_regions);
            break;
        case 'll':
				 $("#prosection_region").html(""); //reset child options
				list(ll_regions);
            break; 
		case 'tx':
				 $("#prosection_region").html(""); //reset child options
				list(tx_regions);
            break;
        case 'ab':
				 $("#prosection_region").html(""); //reset child options
				list(ab_regions);
            break; 
		case 'gu':
				 $("#prosection_region").html(""); //reset child options
				list(gu_regions);
            break; 
		case 'head_and_neck':
				 $("#prosection_region").html(""); //reset child options
				list(head_and_neck_regions);
            break; 
		case 'back':
				 $("#prosection_region").html(""); //reset child options
				list(back_regions);
            break; 
		case 'neuro':
				 $("#prosection_region").html(""); //reset child options
				list(neuro_regions);
            break;             
        default: //default child option is blank
            $("#child_selection").html(''); 
            break;
    }
});	
// Change function: populate the specific region select box when basic region select box option is chosen
$("#prosection_region").change(function() {
    var parent_1 = $(this).val(); 
	//console.log($("#prosection_region").val());
    switch(parent_1){ 
        case 'ul_shoulder':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_shoulder_regions);
            break;
        case 'ul_arm':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_arm_regions);
            break;
		case 'ul_forearm':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_forearm_regions);
            break;  
		case 'ul_hand':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_hand_regions);
            break;
		case 'ul_joints':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_joints_regions);
            break; 
		case 'll_hip_to_knee':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_hip_to_knee_regions);
            break;
		case 'll_knee_to_foot':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_knee_to_foot_regions);
            break; 
		case 'll_dorsum_of_foot':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_dorsum_of_foot_regions);
            break;
		case 'll_foot_plantar ':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_foot_plantar_regions);
            break;
		case 'll_joints':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_foot_joints_regions);
            break;
		case 'gu_pelvic_floor_and_perineum':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_gu_pelvic_floor_regions);
            break; 
		case 'gu_pelvis_with_viscera':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_gu_pelvis_with_viscera_regions);
            break; 
		case 'gu_pelvic_organs':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_gu_pelvic_organs_regions);
            break;    
		case 'tx_anterior_wall':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_tx_anterior_wall_regions);
            break; 
		case 'tx_thorax_no_viscera':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_tx_thorax_no_viscera_regions);
            break; 
		case 'tx_posterior_wall':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_tx_posterior_wall_regions);
            break; 
		case 'tx_thorax_with_viscera':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_tx_thorax_with_viscera_regions);
            break;   
		case 'tx_thoracic_organs':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_tx_thoracic_organs_regions);
            break;
		case 'ab_anterior_wall':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_ab_anterior_wall_regions);
            break;
		case 'ab_posterior_wall':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_ab_posterior_wall_regions);
            break;
		case 'ab_abdonimal_organs':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_ab_abdonimal_organs);
            break;
		case 'ab_abdomen_with_viscera':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_ab_abdomen_with_viscera_regions);
            break;   
		case 'head_and_neck_face_superficial':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_head_and_neck_face_superficial_regions);
            break;  
		case 'head_and_neck_face_deep':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_head_and_neck_face_deep_regions);
            break;  
		case 'head_and_neck_neck':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_head_and_neck_neck_regions);
            break;  
		case 'head_and_neck_oral_and_nasal_cavity':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_head_and_neck_oral_and_nasal_cavity_regions);
            break; 
		case 'back_superficial':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_back_superficial_regions);
            break; 
		case 'back_intermediate':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_back_intermediate_regions);
            break; 
		case 'back_deep':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_back_deep_regions);
            break; 
		case 'back_back_of_neck':
				 $("#prosection_region_specific").html(""); //reset child options
				list_1(specific_back_back_of_neck_regions);
            break; 
        default: //default child option is blank
            $("#child_selection_1").html(''); 
            break;
    }
});
// ************************************************************************************************************************************************************//
//function to populate child select box >> FOR THE REGION SELECT BOX >>>>>>>>>>>>>>>>>>>>>>> SECOND SELECTION ROW
function list_new(array_list_new)
{
  $("#prosection_region_1").html(""); //reset child options
  $(array_list_new).each(function (i) { //populate child options 
	  $("#prosection_region_1").append("<option value=\""+array_list_new[i].value+"\">"+array_list_new[i].display+"</option>");
  });
}	
//function to populate child select box >> FOR THE REGION SPECIFIC SELECT BOX
function list_1_new(array_list_1_new)
{
  $("#prosection_region_specific_1").html(""); //reset child options
		
  $(array_list_1_new).each(function (i) { //populate child options 
   console.log(this.value);
    var inArrayOrNot_1 = $.inArray(this.value, php_feature_specific_array_2);
	console.log(inArrayOrNot_1);
	   if(inArrayOrNot_1 != -1) {
	  		$("#prosection_region_specific_1").append("<option selected='selected' value=\""+array_list_1_new[i].value+"\">"+array_list_1_new[i].display+"</option>");
	   } else {
		   $("#prosection_region_specific_1").append("<option value=\""+array_list_1_new[i].value+"\">"+array_list_1_new[i].display+"</option>");
	   }
	  $('#prosection_region_specific_1').multipleSelect('refresh');
  });
}
  
// Change function: populate the region select box when type of prosection select box option is chosen
$("#type_of_prosection_1").change(function() {
    var parent = $(this).val(); 
    switch(parent){ 
        case 'ul':
				 $("#prosection_region_1").html(""); //reset child options
				list_new(ul_regions);
            break;
        case 'll':
				 $("#prosection_region_1").html(""); //reset child options
				list_new(ll_regions);
            break; 
		case 'tx':
				 $("#prosection_region_1").html(""); //reset child options
				list_new(tx_regions);
            break;
        case 'ab':
				 $("#prosection_region_1").html(""); //reset child options
				list_new(ab_regions);
            break; 
		case 'gu':
				 $("#prosection_region_1").html(""); //reset child options
				list_new(gu_regions);
            break; 
		case 'head_and_neck':
				 $("#prosection_region_1").html(""); //reset child options
				list_new(head_and_neck_regions);
            break; 
		case 'back':
				 $("#prosection_region_1").html(""); //reset child options
				list_new(back_regions);
            break;   
		case 'neuro':
				 $("#prosection_region_1").html(""); //reset child options
				list_new(neuro_regions);
            break;            
        default: //default child option is blank
            $("#child_selection").html(''); 
            break;
    }
});	
// Change function: populate the specific region select box when basic region select box option is chosen
$("#prosection_region_1").change(function() {
    var parent_1 = $(this).val(); 
	//console.log($("#prosection_region").val());
    switch(parent_1){ 
        case 'ul_shoulder':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_shoulder_regions);
            break;
        case 'ul_arm':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_arm_regions);
            break;
		case 'ul_forearm':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_forearm_regions);
            break;  
		case 'ul_hand':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_hand_regions);
            break;
		case 'ul_joints':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_joints_regions);
            break;
		case 'll_hip_to_knee':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_hip_to_knee_regions);
            break;
		case 'll_knee_to_foot':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_knee_to_foot_regions);
            break; 
		case 'll_joints':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_foot_joints_regions);
            break;
		case 'll_foot_plantar ':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_foot_plantar_regions);
            break;
		case 'll_dorsum_of_foot':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_dorsum_of_foot_regions);
            break;
		case 'gu_pelvic_floor_and_perineum':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_gu_pelvic_floor_regions);
            break; 
		case 'gu_pelvis_with_viscera':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_gu_pelvis_with_viscera_regions);
            break; 
		case 'gu_pelvic_organs':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_gu_pelvic_organs_regions);
            break;  
		case 'tx_anterior_wall':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_tx_anterior_wall_regions);
            break; 
		case 'tx_thorax_no_viscera':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_tx_thorax_no_viscera_regions);
            break; 
		case 'tx_posterior_wall':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_tx_posterior_wall_regions);
            break; 
		case 'tx_thorax_with_viscera':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_tx_thorax_with_viscera_regions);
            break;   
		case 'tx_thoracic_organs':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_tx_thoracic_organs_regions);
            break;
		case 'ab_anterior_wall':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_ab_anterior_wall_regions);
            break;
		case 'ab_posterior_wall':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_ab_posterior_wall_regions);
            break;
		case 'ab_abdomen_with_viscera':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_ab_abdomen_with_viscera_regions);
            break;   
		case 'ab_abdonimal_organs':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_ab_abdonimal_organs);
            break;
		case 'head_and_neck_face_superficial':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_head_and_neck_face_superficial_regions);
            break;  
		case 'head_and_neck_face_deep':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_head_and_neck_face_deep_regions);
            break;  
		case 'head_and_neck_neck':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_head_and_neck_neck_regions);
            break;  
		case 'head_and_neck_oral_and_nasal_cavity':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_head_and_neck_oral_and_nasal_cavity_regions);
            break; 
		case 'back_superficial':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_back_superficial_regions);
            break; 
		case 'back_intermediate':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_back_intermediate_regions);
            break; 
		case 'back_deep':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_back_deep_regions);
            break; 
		case 'back_back_of_neck':
				 $("#prosection_region_specific_1").html(""); //reset child options
				list_1_new(specific_back_back_of_neck_regions);
            break;                           
        default: //default child option is blank
            $("#child_selection_1").html(''); 
            break;
    }
});
// ************************************************************************************************************************************************************//
//function to populate child select box >> FOR THE REGION SELECT BOX >>>>>>>>>>>>>>>>>>>>>>> THIRD SELECTION ROW
function list_new_2(array_list_new_2)
{
  $("#prosection_region_2").html(""); //reset child options
  $(array_list_new_2).each(function (i) { //populate child options 
	  $("#prosection_region_2").append("<option value=\""+array_list_new_2[i].value+"\">"+array_list_new_2[i].display+"</option>");
  });
}	
//function to populate child select box >> FOR THE REGION SPECIFIC SELECT BOX
function list_2_new(array_list_2_new)
{
  $("#prosection_region_specific_2").html(""); //reset child options
  $(array_list_2_new).each(function (i) { //populate child options 
   console.log(this.value);
   var inArrayOrNot_2 = $.inArray(this.value, php_feature_specific_array_3);
	console.log(inArrayOrNot_2);
	if(inArrayOrNot_2 != -1) {
		$("#prosection_region_specific_2").append("<option selected='selected' value=\""+array_list_2_new[i].value+"\">"+array_list_2_new[i].display+"</option>");
	   } else {
	  		$("#prosection_region_specific_2").append("<option value=\""+array_list_2_new[i].value+"\">"+array_list_2_new[i].display+"</option>");
	   }
	  $('#prosection_region_specific_2').multipleSelect('refresh');
  });
}
    
// Change function: populate the region select box when type of prosection select box option is chosen
$("#type_of_prosection_2").change(function() {
    var parent = $(this).val(); 
    switch(parent){ 
        case 'ul':
				 $("#prosection_region_2").html(""); //reset child options
				list_new_2(ul_regions);
            break;
        case 'll':
				 $("#prosection_region_2").html(""); //reset child options
				list_new_2(ll_regions);
            break; 
		case 'tx':
				 $("#prosection_region_2").html(""); //reset child options
				list_new_2(tx_regions);
            break;
        case 'ab':
				 $("#prosection_region_2").html(""); //reset child options
				list_new_2(ab_regions);
            break; 
		case 'gu':
				 $("#prosection_region_2").html(""); //reset child options
				list_new_2(gu_regions);
            break;    
		case 'head_and_neck':
				 $("#prosection_region_2").html(""); //reset child options
				list_new_2(head_and_neck_regions);
            break; 
		case 'back':
				 $("#prosection_region_2").html(""); //reset child options
				list_new_2(back_regions);
            break;     
		case 'neuro':
				 $("#prosection_region_2").html(""); //reset child options
				list_new_2(neuro_regions);
            break;          
        default: //default child option is blank
            $("#child_selection").html(''); 
            break;
    }
});	
// Change function: populate the specific region select box when basic region select box option is chosen
$("#prosection_region_2").change(function() {
    var parent_1 = $(this).val(); 
	//console.log($("#prosection_region").val());
    switch(parent_1){ 
       case 'ul_shoulder':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_shoulder_regions);
            break;
        case 'ul_arm':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_arm_regions);
            break;
		case 'ul_forearm':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_forearm_regions);
            break;  
		case 'ul_hand':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_hand_regions);
            break;
		case 'ul_joints':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_joints_regions);
            break;
		case 'll_hip_to_knee':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_hip_to_knee_regions);
            break;
		case 'll_knee_to_foot':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_knee_to_foot_regions);
            break; 
		case 'll_joints':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_foot_joints_regions);
            break;
		case 'll_dorsum_of_foot':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_dorsum_of_foot_regions);
            break;
		case 'll_foot_plantar ':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_foot_plantar_regions);
            break;
		case 'gu_pelvic_floor_and_perineum':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_gu_pelvic_floor_regions);
            break; 
		case 'gu_pelvis_with_viscera':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_gu_pelvis_with_viscera_regions);
            break; 
		case 'gu_pelvic_organs':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_gu_pelvic_organs_regions);
            break; 
		case 'tx_anterior_wall':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_tx_anterior_wall_regions);
            break; 
		case 'tx_thorax_no_viscera':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_tx_thorax_no_viscera_regions);
            break; 
		case 'tx_posterior_wall':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_tx_posterior_wall_regions);
            break; 
		case 'tx_thorax_with_viscera':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_tx_thorax_with_viscera_regions);
            break;   
		case 'tx_thoracic_organs':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_tx_thoracic_organs_regions);
            break;
		case 'ab_anterior_wall':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_ab_anterior_wall_regions);
            break;
		case 'ab_posterior_wall':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_ab_posterior_wall_regions);
            break;
		case 'ab_abdonimal_organs':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_ab_abdonimal_organs);
            break;
		case 'ab_abdomen_with_viscera':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_ab_abdomen_with_viscera_regions);
            break;   
		case 'head_and_neck_face_superficial':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_head_and_neck_face_superficial_regions);
            break;  
		case 'head_and_neck_face_deep':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_head_and_neck_face_deep_regions);
            break;  
		case 'head_and_neck_neck':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_head_and_neck_neck_regions);
            break;  
		case 'head_and_neck_oral_and_nasal_cavity':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_head_and_neck_oral_and_nasal_cavity_regions);
            break; 
		case 'back_superficial':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_back_superficial_regions);
            break; 
		case 'back_intermediate':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_back_intermediate_regions);
            break; 
		case 'back_deep':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_back_deep_regions);
            break; 
		case 'back_back_of_neck':
				 $("#prosection_region_specific_2").html(""); //reset child options
				list_2_new(specific_back_back_of_neck_regions);
            break;                        
        default: //default child option is blank
            $("#child_selection_1").html(''); 
            break;
    }
});
// ************************************************************************************************************************************************************//
//function to populate child select box >> FOR THE REGION SELECT BOX >>>>>>>>>>>>>>>>>>>>>>> FOURTH SELECTION ROW
function list_new_3(array_list_new_3)
{
  $("#prosection_region_3").html(""); //reset child options
  $(array_list_new_3).each(function (i) { //populate child options 
	  $("#prosection_region_3").append("<option value=\""+array_list_new_3[i].value+"\">"+array_list_new_3[i].display+"</option>");
  });
}	

//function to populate child select box >> FOR THE REGION SPECIFIC SELECT BOX
function list_3_new(array_list_3_new)
{
  $("#prosection_region_specific_3").html(""); //reset child options
  $(array_list_3_new).each(function (i) { //populate child options 
  console.log(this.value);
  var inArrayOrNot_3 = $.inArray(this.value, php_feature_specific_array_4);
	console.log(inArrayOrNot_3);
	   if(inArrayOrNot_3 != -1) {
		   $("#prosection_region_specific_3").append("<option selected='selected' value=\""+array_list_3_new[i].value+"\">"+array_list_3_new[i].display+"</option>");
	   } else {
		  $("#prosection_region_specific_3").append("<option value=\""+array_list_3_new[i].value+"\">"+array_list_3_new[i].display+"</option>");
	   }
	  $('#prosection_region_specific_3').multipleSelect('refresh');
  });
}
  
// Change function: populate the region select box when type of prosection select box option is chosen
$("#type_of_prosection_3").change(function() {
    var parent = $(this).val(); 
    switch(parent){ 
        case 'ul':
				 $("#prosection_region_3").html(""); //reset child options
				list_new_3(ul_regions);
            break;
        case 'll':
				 $("#prosection_region_3").html(""); //reset child options
				list_new_3(ll_regions);
            break; 
		case 'tx':
				 $("#prosection_region_3").html(""); //reset child options
				list_new_3(tx_regions);
            break;
        case 'ab':
				 $("#prosection_region_3").html(""); //reset child options
				list_new_3(ab_regions);
            break; 
		case 'gu':
				 $("#prosection_region_3").html(""); //reset child options
				list_new_3(gu_regions);
            break;    
		case 'head_and_neck':
				 $("#prosection_region_3").html(""); //reset child options
				list_new_3(head_and_neck_regions);
            break; 
		case 'back':
				 $("#prosection_region_3").html(""); //reset child options
				list_new_3(back_regions);
            break;         
		case 'neuro':
				 $("#prosection_region_3").html(""); //reset child options
				list_new_3(neuro_regions);
            break;   
        default: //default child option is blank
            $("#child_selection").html(''); 
            break;
    }
});	
// Change function: populate the specific region select box when basic region select box option is chosen
$("#prosection_region_3").change(function() {
    var parent_1 = $(this).val(); 
	//console.log($("#prosection_region").val());
    switch(parent_1){ 
         case 'ul_shoulder':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_shoulder_regions);
            break;
        case 'ul_arm':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_arm_regions);
            break;
		case 'ul_forearm':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_forearm_regions);
            break;  
		case 'ul_hand':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_hand_regions);
            break;
		case 'ul_joints':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_joints_regions);
            break; 
		case 'll_hip_to_knee':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_hip_to_knee_regions);
            break;
		case 'll_knee_to_foot':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_knee_to_foot_regions);
            break; 
		case 'll_dorsum_of_foot':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_dorsum_of_foot_regions);
            break;
		case 'll_joints':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_foot_joints_regions);
            break;
		case 'll_foot_plantar ':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_foot_plantar_regions);
            break;
		case 'gu_pelvic_floor_and_perineum':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_gu_pelvic_floor_regions);
            break; 
		case 'gu_pelvis_with_viscera':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_gu_pelvis_with_viscera_regions);
            break; 
		case 'gu_pelvic_organs':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_gu_pelvic_organs_regions);
            break; 
		case 'tx_anterior_wall':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_tx_anterior_wall_regions);
            break; 
		case 'tx_posterior_wall':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_tx_posterior_wall_regions);
            break; 
		case 'tx_thorax_no_viscera':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_tx_thorax_no_viscera_regions);
            break; 
		case 'tx_thorax_with_viscera':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_tx_thorax_with_viscera_regions);
            break;   
		case 'tx_thoracic_organs':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_tx_thoracic_organs_regions);
            break;
		case 'ab_anterior_wall':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_ab_anterior_wall_regions);
            break;
		case 'ab_posterior_wall':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_ab_posterior_wall_regions);
            break;
		case 'ab_abdomen_with_viscera':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_ab_abdomen_with_viscera_regions);
            break;  
		case 'ab_abdonimal_organs':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_ab_abdonimal_organs);
            break; 
		case 'head_and_neck_face_superficial':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_head_and_neck_face_superficial_regions);
            break;  
		case 'head_and_neck_face_deep':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_head_and_neck_face_deep_regions);
            break;  
		case 'head_and_neck_neck':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_head_and_neck_neck_regions);
            break;  
		case 'head_and_neck_oral_and_nasal_cavity':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_head_and_neck_oral_and_nasal_cavity_regions);
            break; 
		case 'back_superficial':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_back_superficial_regions);
            break; 
		case 'back_intermediate':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_back_intermediate_regions);
            break; 
		case 'back_deep':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_back_deep_regions);
            break; 
		case 'back_back_of_neck':
				 $("#prosection_region_specific_3").html(""); //reset child options
				list_3_new(specific_back_back_of_neck_regions);
            break;              
        default: //default child option is blank
            $("#child_selection_1").html(''); 
            break;
    }
});
// ************************************************************************************************************************************************************//
//function to populate child select box >> FOR THE REGION SELECT BOX >>>>>>>>>>>>>>>>>>>>>>> FIFTH SELECTION ROW
function list_new_4(array_list_new_4)
{
  $("#prosection_region_4").html(""); //reset child options
  $(array_list_new_4).each(function (i) { //populate child options 
	  $("#prosection_region_4").append("<option value=\""+array_list_new_4[i].value+"\">"+array_list_new_4[i].display+"</option>");
  });
}	
//function to populate child select box >> FOR THE REGION SPECIFIC SELECT BOX
function list_4_new(array_list_4_new)
{
  $("#prosection_region_specific_4").html(""); //reset child options
  $(array_list_4_new).each(function (i) { //populate child options 
   console.log(this.value);
    var inArrayOrNot_4 = $.inArray(this.value, php_feature_specific_array_5);
	console.log(inArrayOrNot_4);
	   if(inArrayOrNot_4 != -1) {
		   $("#prosection_region_specific_4").append("<option selected='selected' value=\""+array_list_4_new[i].value+"\">"+array_list_4_new[i].display+"</option>");
	   } else {
		   $("#prosection_region_specific_4").append("<option value=\""+array_list_4_new[i].value+"\">"+array_list_4_new[i].display+"</option>");
	   }
	  $('#prosection_region_specific_4').multipleSelect('refresh');
  });
}

// Change function: populate the region select box when type of prosection select box option is chosen
$("#type_of_prosection_4").change(function() {
    var parent = $(this).val(); 
    switch(parent){ 
                case 'ul':
				 $("#prosection_region_4").html(""); //reset child options
				list_new_4(ul_regions);
            break;
        case 'll':
				 $("#prosection_region_4").html(""); //reset child options
				list_new_4(ll_regions);
            break; 
		case 'tx':
				 $("#prosection_region_4").html(""); //reset child options
				list_new_4(tx_regions);
            break;
        case 'ab':
				 $("#prosection_region_4").html(""); //reset child options
				list_new_4(ab_regions);
            break; 
		case 'gu':
				 $("#prosection_region_4").html(""); //reset child options
				list_new_4(gu_regions);
            break;   
		case 'head_and_neck':
				 $("#prosection_region_4").html(""); //reset child options
				list_new_4(head_and_neck_regions);
            break; 
		case 'back':
				 $("#prosection_region_4").html(""); //reset child options
				list_new_4(back_regions);
            break; 
		case 'neuro':
				 $("#prosection_region_4").html(""); //reset child options
				list_new_4(neuro_regions);
            break;            
        default: //default child option is blank
            $("#child_selection").html(''); 
            break;
    }
});	

// Change function: populate the specific region select box when basic region select box option is chosen
$("#prosection_region_specific_4").change(function() {
    var parent_1 = $(this).val(); 
	//console.log($("#prosection_region").val());
    switch(parent_1){ 
       case 'ul_shoulder':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_shoulder_regions);
            break;
        case 'ul_arm':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_arm_regions);
            break;
		case 'ul_forearm':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_forearm_regions);
            break;  
		case 'ul_hand':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_hand_regions);
            break;
		case 'ul_joints':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_joints_regions);
            break; 
		case 'll_hip_to_knee':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_hip_to_knee_regions);
            break;
		case 'll_foot_plantar ':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_foot_plantar_regions);
            break;
		case 'll_knee_to_foot':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_knee_to_foot_regions);
            break; 
		case 'll_joints':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_foot_joints_regions);
            break;
		case 'll_dorsum_of_foot':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_dorsum_of_foot_regions);
            break;
		case 'gu_pelvic_floor_and_perineum':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_gu_pelvic_floor_regions);
            break; 
		case 'gu_pelvis_with_viscera':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_gu_pelvis_with_viscera_regions);
            break; 
		case 'gu_pelvic_organs':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_gu_pelvic_organs_regions);
            break;   
		case 'tx_anterior_wall':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_tx_anterior_wall_regions);
            break; 
		case 'tx_thorax_no_viscera':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_tx_thorax_no_viscera_regions);
            break; 
		case 'tx_posterior_wall':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_tx_posterior_wall_regions);
            break; 
		case 'tx_thorax_with_viscera':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_tx_thorax_with_viscera_regions);
            break;   
		case 'tx_thoracic_organs':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_tx_thoracic_organs_regions);
            break;
		case 'ab_anterior_wall':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_ab_anterior_wall_regions);
            break;
		case 'ab_abdonimal_organs':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_ab_abdonimal_organs);
            break; 
		case 'ab_posterior_wall':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_ab_posterior_wall_regions);
            break;
		case 'ab_abdomen_with_viscera':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_ab_abdomen_with_viscera_regions);
            break;   
		case 'head_and_neck_face_superficial':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_head_and_neck_face_superficial_regions);
            break;  
		case 'head_and_neck_face_deep':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_head_and_neck_face_deep_regions);
            break;  
		case 'head_and_neck_neck':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_head_and_neck_neck_regions);
            break;  
		case 'head_and_neck_oral_and_nasal_cavity':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_head_and_neck_oral_and_nasal_cavity_regions);
            break; 
		case 'back_superficial':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_back_superficial_regions);
            break; 
		case 'back_intermediate':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_back_intermediate_regions);
            break; 
		case 'back_deep':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_back_deep_regions);
            break; 
		case 'back_back_of_neck':
				 $("#prosection_region_specific_4").html(""); //reset child options
				list_4_new(specific_back_back_of_neck_regions);
            break;             
        default: //default child option is blank
            $("#child_selection_1").html(''); 
            break;
    }
});