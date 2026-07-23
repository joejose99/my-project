<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class frmAddDepart
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        If disposing AndAlso components IsNot Nothing Then
            components.Dispose()
        End If
        MyBase.Dispose(disposing)
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(frmAddDepart))
        Me.btnReset = New System.Windows.Forms.Button
        Me.butExit = New System.Windows.Forms.Button
        Me.Label23 = New System.Windows.Forms.Label
        Me.txtCCode = New System.Windows.Forms.TextBox
        Me.Label2 = New System.Windows.Forms.Label
        Me.Label19 = New System.Windows.Forms.Label
        Me.btngo = New System.Windows.Forms.Button
        Me.txtCourseName = New System.Windows.Forms.TextBox
        Me.txtSem = New System.Windows.Forms.TextBox
        Me.txtSec = New System.Windows.Forms.TextBox
        Me.Label10 = New System.Windows.Forms.Label
        Me.DateTimePicker1 = New System.Windows.Forms.DateTimePicker
        Me.Label9 = New System.Windows.Forms.Label
        Me.Label5 = New System.Windows.Forms.Label
        Me.Panel2 = New System.Windows.Forms.Panel
        Me.Panel1 = New System.Windows.Forms.Panel
        Me.Panel2.SuspendLayout()
        Me.Panel1.SuspendLayout()
        Me.SuspendLayout()
        '
        'btnReset
        '
        Me.btnReset.Location = New System.Drawing.Point(432, 10)
        Me.btnReset.Name = "btnReset"
        Me.btnReset.Size = New System.Drawing.Size(68, 25)
        Me.btnReset.TabIndex = 49
        Me.btnReset.Text = "Re&set"
        Me.btnReset.UseVisualStyleBackColor = True
        '
        'butExit
        '
        Me.butExit.Location = New System.Drawing.Point(515, 10)
        Me.butExit.Name = "butExit"
        Me.butExit.Size = New System.Drawing.Size(65, 25)
        Me.butExit.TabIndex = 50
        Me.butExit.Text = "Ex&it"
        Me.butExit.UseVisualStyleBackColor = True
        '
        'Label23
        '
        Me.Label23.AutoSize = True
        Me.Label23.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label23.ForeColor = System.Drawing.Color.White
        Me.Label23.Location = New System.Drawing.Point(173, 2)
        Me.Label23.Name = "Label23"
        Me.Label23.Size = New System.Drawing.Size(156, 16)
        Me.Label23.TabIndex = 51
        Me.Label23.Text = "Add  Department  Form"
        '
        'txtCCode
        '
        Me.txtCCode.Location = New System.Drawing.Point(176, 13)
        Me.txtCCode.Name = "txtCCode"
        Me.txtCCode.Size = New System.Drawing.Size(151, 20)
        Me.txtCCode.TabIndex = 34
        '
        'Label2
        '
        Me.Label2.AutoSize = True
        Me.Label2.Location = New System.Drawing.Point(330, 93)
        Me.Label2.Name = "Label2"
        Me.Label2.Size = New System.Drawing.Size(60, 13)
        Me.Label2.TabIndex = 222
        Me.Label2.Text = "Member  Id"
        '
        'Label19
        '
        Me.Label19.AutoSize = True
        Me.Label19.Font = New System.Drawing.Font("Microsoft Sans Serif", 9.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label19.ForeColor = System.Drawing.SystemColors.ControlLightLight
        Me.Label19.Location = New System.Drawing.Point(31, 14)
        Me.Label19.Name = "Label19"
        Me.Label19.Size = New System.Drawing.Size(123, 15)
        Me.Label19.TabIndex = 36
        Me.Label19.Text = "Deparment  Code:"
        '
        'btngo
        '
        Me.btngo.Location = New System.Drawing.Point(361, 10)
        Me.btngo.Name = "btngo"
        Me.btngo.Size = New System.Drawing.Size(57, 25)
        Me.btngo.TabIndex = 46
        Me.btngo.Text = "G&o"
        Me.btngo.UseVisualStyleBackColor = True
        '
        'txtCourseName
        '
        Me.txtCourseName.Location = New System.Drawing.Point(131, 90)
        Me.txtCourseName.Name = "txtCourseName"
        Me.txtCourseName.Size = New System.Drawing.Size(164, 20)
        Me.txtCourseName.TabIndex = 221
        '
        'txtSem
        '
        Me.txtSem.Enabled = False
        Me.txtSem.Location = New System.Drawing.Point(401, 90)
        Me.txtSem.Name = "txtSem"
        Me.txtSem.Size = New System.Drawing.Size(164, 20)
        Me.txtSem.TabIndex = 218
        '
        'txtSec
        '
        Me.txtSec.BackColor = System.Drawing.Color.FromArgb(CType(CType(255, Byte), Integer), CType(CType(255, Byte), Integer), CType(CType(128, Byte), Integer))
        Me.txtSec.Cursor = System.Windows.Forms.Cursors.Hand
        Me.txtSec.Location = New System.Drawing.Point(131, 127)
        Me.txtSec.Name = "txtSec"
        Me.txtSec.Size = New System.Drawing.Size(164, 20)
        Me.txtSec.TabIndex = 217
        '
        'Label10
        '
        Me.Label10.AutoSize = True
        Me.Label10.Location = New System.Drawing.Point(7, 93)
        Me.Label10.Name = "Label10"
        Me.Label10.Size = New System.Drawing.Size(96, 13)
        Me.Label10.TabIndex = 215
        Me.Label10.Text = "Department Name:"
        '
        'DateTimePicker1
        '
        Me.DateTimePicker1.Location = New System.Drawing.Point(401, 126)
        Me.DateTimePicker1.Name = "DateTimePicker1"
        Me.DateTimePicker1.Size = New System.Drawing.Size(184, 20)
        Me.DateTimePicker1.TabIndex = 216
        '
        'Label9
        '
        Me.Label9.AutoSize = True
        Me.Label9.Location = New System.Drawing.Point(9, 134)
        Me.Label9.Name = "Label9"
        Me.Label9.Size = New System.Drawing.Size(109, 13)
        Me.Label9.TabIndex = 214
        Me.Label9.Text = "Head of Department: "
        '
        'Label5
        '
        Me.Label5.AutoSize = True
        Me.Label5.Location = New System.Drawing.Point(330, 133)
        Me.Label5.Name = "Label5"
        Me.Label5.Size = New System.Drawing.Size(36, 13)
        Me.Label5.TabIndex = 213
        Me.Label5.Text = " Date:"
        '
        'Panel2
        '
        Me.Panel2.BackColor = System.Drawing.SystemColors.ControlDarkDark
        Me.Panel2.Controls.Add(Me.Label23)
        Me.Panel2.Location = New System.Drawing.Point(-2, 0)
        Me.Panel2.Name = "Panel2"
        Me.Panel2.Size = New System.Drawing.Size(666, 20)
        Me.Panel2.TabIndex = 220
        '
        'Panel1
        '
        Me.Panel1.BackColor = System.Drawing.SystemColors.ButtonShadow
        Me.Panel1.Controls.Add(Me.butExit)
        Me.Panel1.Controls.Add(Me.btnReset)
        Me.Panel1.Controls.Add(Me.txtCCode)
        Me.Panel1.Controls.Add(Me.Label19)
        Me.Panel1.Controls.Add(Me.btngo)
        Me.Panel1.Location = New System.Drawing.Point(-2, 29)
        Me.Panel1.Name = "Panel1"
        Me.Panel1.Size = New System.Drawing.Size(666, 45)
        Me.Panel1.TabIndex = 219
        '
        'frmAddDepart
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(603, 188)
        Me.Controls.Add(Me.Label2)
        Me.Controls.Add(Me.txtCourseName)
        Me.Controls.Add(Me.txtSem)
        Me.Controls.Add(Me.txtSec)
        Me.Controls.Add(Me.Label10)
        Me.Controls.Add(Me.DateTimePicker1)
        Me.Controls.Add(Me.Label9)
        Me.Controls.Add(Me.Label5)
        Me.Controls.Add(Me.Panel2)
        Me.Controls.Add(Me.Panel1)
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.MaximizeBox = False
        Me.Name = "frmAddDepart"
        Me.Panel2.ResumeLayout(False)
        Me.Panel2.PerformLayout()
        Me.Panel1.ResumeLayout(False)
        Me.Panel1.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents btnReset As System.Windows.Forms.Button
    Friend WithEvents butExit As System.Windows.Forms.Button
    Friend WithEvents Label23 As System.Windows.Forms.Label
    Friend WithEvents txtCCode As System.Windows.Forms.TextBox
    Friend WithEvents Label2 As System.Windows.Forms.Label
    Friend WithEvents Label19 As System.Windows.Forms.Label
    Friend WithEvents btngo As System.Windows.Forms.Button
    Friend WithEvents txtCourseName As System.Windows.Forms.TextBox
    Friend WithEvents txtSem As System.Windows.Forms.TextBox
    Friend WithEvents txtSec As System.Windows.Forms.TextBox
    Friend WithEvents Label10 As System.Windows.Forms.Label
    Friend WithEvents DateTimePicker1 As System.Windows.Forms.DateTimePicker
    Friend WithEvents Label9 As System.Windows.Forms.Label
    Friend WithEvents Label5 As System.Windows.Forms.Label
    Friend WithEvents Panel2 As System.Windows.Forms.Panel
    Friend WithEvents Panel1 As System.Windows.Forms.Panel
End Class
