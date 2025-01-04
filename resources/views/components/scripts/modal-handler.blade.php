<script>
    // Helper function to clean up modal artifacts
    function cleanupModalArtifacts() {
        // Remove all modal backdrops
        document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
        // Reset body styles
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
    }
    // Helper function to safely get modal instance
    function getOrCreateModalInstance(modalId) {
        const modalElement = document.getElementById(modalId);
        let modalInstance = bootstrap.Modal.getInstance(modalElement);

        if (!modalInstance) {
            modalInstance = new bootstrap.Modal(modalElement);
        }

        return modalInstance;
    }

    // Function to safely hide modal
    function safeHideModal(modalId) {
        const modalInstance = bootstrap.Modal.getInstance(document.getElementById(modalId));
        if (modalInstance) {
            modalInstance.hide();
        }
        cleanupModalArtifacts();
    }
    // Show form modal function
    function showFormModal(type) {
        // First, safely hide pilih kelas modal
        safeHideModal('pilihKelasModal');

        // Clean up any existing modal artifacts
        cleanupModalArtifacts();

        // Show appropriate form modal
        setTimeout(() => {
            if (type === 'daycare') {
                const modal = getOrCreateModalInstance('formDaycareModal');
                modal.show();
            } else if (type === 'tk') {
                const modal = getOrCreateModalInstance('formTKModal');
                modal.show();
            }
        }, 200); // Small delay to ensure proper transition
    }
    // Initialize event listeners once DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Handle modal hidden events
        ['formDaycareModal', 'formTKModal', 'pilihKelasModal'].forEach(modalId => {
            const modalElement = document.getElementById(modalId);
            if (modalElement) {
                modalElement.addEventListener('hidden.bs.modal', function() {
                    // Reset form if exists
                    const form = this.querySelector('form');
                    if (form) {
                        form.reset();
                    }

                    // Clean up modal artifacts
                    cleanupModalArtifacts();
                });

                // Additional safety check when showing modal
                modalElement.addEventListener('show.bs.modal', function() {
                    cleanupModalArtifacts();
                });
            }
        });
        // Add click handlers for close buttons
        document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const modalId = this.closest('.modal').id;
                safeHideModal(modalId);
            });
        });
    });
    // Handle Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            cleanupModalArtifacts();
        }
    });
</script>
