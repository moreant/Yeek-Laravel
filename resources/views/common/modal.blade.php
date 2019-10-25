<!-- 模态框 -->
<div class="container">
    <!-- 模态框 -->
    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-lg" style="margin-top: 20vh;min-width:40%">
            <div class="modal-content">

                <!-- 模态框头部 -->
                <div class="modal-header">
                    {{ $header }}
                </div>

                <!-- 模态框主体 -->
                <div class="modal-body">
                    {{ $body }}
                </div>

                <!-- 模态框底部 -->
                <div class="modal-footer">
                    {{ $footer }}
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end 模态框 -->