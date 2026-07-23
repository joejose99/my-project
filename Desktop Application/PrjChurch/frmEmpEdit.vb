Imports System.Data.OleDb
Public Class frmEmpEdit

    Private Sub CheckBox1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged
        Try
            If CheckBox1.Checked = True Then
                txtCourseName.Enabled = False
                txtCCode.Enabled = False
                txtSec.Enabled = False
                txtSem.Enabled = False
                DateTimePicker1.Enabled = False


                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [departstaff]"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim rows As Integer
                While myAccessReader.Read
                    rows = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                strconss.Close()
                If rows <> 0 Then
                    dtptEdit.Rows.Clear()
                    Call conns()
                    str_sql_user_select = "SELECT *  FROM departstaff "
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ' dt.Columns.Add("description", GetType(String))
                    dtptEdit.Rows.Add(rows)
                    'If dr.Read.Equals(True) Then
                    Dim ro As Integer = 0
                    While myAccessReader.Read()

                        'reading from the datareader
                        dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vDepartStaffCode")
                        dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                        dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vEmpid")
                        dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vFname")
                        dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("ddate")
                        dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("id")


                        'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                        ro += 1

                        'End If
                    End While


                    strconss.Close()

                End If
                If CheckBox1.Checked = False Then
                    dtptEdit.Rows.Clear()
                    Me.CheckBox1.Checked = False
                    txtCCode.Enabled = True
                    txtCourseName.Enabled = True
                    txtCCode.Enabled = True
                    txtSec.Enabled = True
                    txtSem.Enabled = True
                    DateTimePicker1.Enabled = True


                    butEdit.Visible = False
                    butDelete.Visible = False
                    strconss.Close()
                End If
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private _regis As String



    Public Property BookNamess() As String
        Get
            Return _regis
        End Get
        Set(ByVal value As String)
            _regis = value
            txtCCode.Text = _regis
            Try
                Call conns()
                str_sql_user_select = "SELECT *  FROM departstaff where vDepartStaffCode= '" & txtCCode.Text.Trim & "'" & ""

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                txtSem.Text = ""
                txtSec.Text = ""
                txtCourseName.Text = ""
                Dim ro As Integer = 0

                While myAccessReader.Read()

                    txtCourseName.Text = myAccessReader(Trim("vDepartName") & "")
                    txtSem.Text = myAccessReader(Trim("vEmpid") & "")

                    DateTimePicker1.Text = myAccessReader(Trim("dDate") & "")

                    txtSec.Text = myAccessReader(Trim("vFname") & "")

                    ro += 1

                End While

                ' myreader.Close()
                strconss.Close()
                Me.dtptEdit.Rows.Clear()




                _regis = ""
                Exit Property
            Catch Exp As OleDb.OleDbException
                MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
            Catch Exp As Exception
                MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
            End Try
        End Set

    End Property

    Private Sub txtCCode_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtCCode.DoubleClick
        frmEmpSearch.MdiParent = mdiChurch
        frmEmpSearch.Show()
        frmEmpSearch.BringToFront()

        frmEmpSearch.WindowState = FormWindowState.Normal

    End Sub

    Private Sub txtCCode_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtCCode.TextChanged

    End Sub


    Public Sub showbut()
        butEdit.Show()
        butDelete.Show()
        txtCCode.Enabled = False
    End Sub
    Public Sub hidbut()
        butEdit.Visible = False
        butDelete.Visible = False
        txtCCode.Enabled = True
    End Sub

    Private Sub txtCourseName_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtCourseName.DoubleClick
        showbut()
    End Sub

    Private Sub txtSec_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtSec.DoubleClick
        showbut()
    End Sub

    Private Sub txtSem_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtSem.DoubleClick
        showbut()
    End Sub



    Private Sub butReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butReset.Click
        hidbut()
        txtCCode.Text = ""
        txtSem.Text = ""
        txtSec.Text = ""
        dtptEdit.Rows.Clear()
        CheckBox1.Checked = False
        txtCourseName.Text = ""

    End Sub

    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try

            Dim sqlStrings As String = ""

            Dim dateapp As String
            dateapp = CStr(DateTimePicker1.Value)


            'Dim ros As Integer
            If txtCCode.Text <> "" And CheckBox1.Checked = False And txtCCode.Enabled = False Then
                Call conns()


                sqlStrings = "UPDATE  [DepartStaff] SET " & _
                  "[vFName] = '" & Me.txtSec.Text & "'," & _
                  "[vEmpid] = '" & Me.txtSem.Text & "'," & _
                 "[vDepartName] = '" & Me.txtCourseName.Text & "'," & _
                 "[ddate] = '" & dateapp & "'" & _
                 "WHERE vDepartStaffCode = '" & Trim(txtCCode.Text) & "" & "'"

                comUserSelectS = New OleDbCommand(sqlStrings, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                MsgBox("Data has been Edited", MsgBoxStyle.DefaultButton1, "Edit")
                CheckBox1.Checked = False

                Exit Sub
                strconss.Close()
            End If

            Call conns()



            Dim ro As Integer
            Dim sqlString As String = ""

            ' Me.dtCourse.Rows.Clear()
            'reading from the datareader
            Dim code As String
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartStaff]"
             comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            code = dtptEdit.Rows(ro).Cells(0).Value
            While rows > ro
                For i As Integer = 0 To dtptEdit.RowCount - 1

                    If code = codes Then


                        sqlString = "UPDATE  [DepartStaff] SET " & _
                       "[vDepartName] = '" & dtptEdit.Rows(ro).Cells(1).Value & "'," & _
                        "[vEmpid] = '" & dtptEdit.Rows(ro).Cells(2).Value & "' ," & _
                        "[vFname] = '" & dtptEdit.Rows(ro).Cells(3).Value & " '," & _
                       "[dDate] = '" & dtptEdit.Rows(ro).Cells(4).Value & "'" & _
                         "where vDepartStaffCode ='" & codes & "'"

                        comUserSelectS = New OleDbCommand(sqlString, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()

                    End If

                Next i

                ro += 1
                code = dtptEdit.Rows(ro).Cells(0).Value

            End While
            MsgBox("Data has been Edited", MsgBoxStyle.DefaultButton1, "Edit")
            'CheckBox1.Checked = False

            strconss.Close()
            Call requery()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try


    End Sub
    Private codes As String
    Private ids As Integer

    Private Sub dtptEdit_CellClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellClick
        codes = ""
        codes = dtptEdit.CurrentRow.Cells(0).Value()
        ids = CInt(dtptEdit.CurrentRow.Cells(5).Value())
    End Sub
    Private Sub dtptEdit_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellContentClick
        codes = ""
        codes = dtptEdit.CurrentRow.Cells(0).Value()
        ids = CInt(dtptEdit.CurrentRow.Cells(5).Value())

    End Sub
    Private Sub requery()
        Try

            If CheckBox1.Checked = True Then
                txtCourseName.Enabled = False
                txtCCode.Enabled = False
                txtSec.Enabled = False
                txtSem.Enabled = False
                DateTimePicker1.Enabled = False


                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartStaff]"
                
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim rows As Integer
                While myAccessReader.Read
                    rows = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                strconss.Close()

                dtptEdit.Rows.Clear()
                Call conns()
                If rows <> 0 Then
                    str_sql_user_select = "SELECT *  FROM DepartStaff"

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ' dt.Columns.Add("description", GetType(String))
                    dtptEdit.Rows.Add(rows)
                    'If dr.Read.Equals(True) Then
                    Dim ro As Integer = 0
                    While myAccessReader.Read()

                        'reading from the datareader
                        dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vDepartStaffCode")
                        dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                        dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vEmpid")
                        dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vFname")
                        dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("ddate")
                        'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")
                        dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("id")


                        ro += 1

                        'End If
                    End While


                    strconss.Close()

                End If
                If CheckBox1.Checked = False Then
                    dtptEdit.Rows.Clear()
                    Me.CheckBox1.Checked = False
                    txtCCode.Enabled = True
                    txtCourseName.Enabled = True
                    txtCCode.Enabled = True
                    txtSec.Enabled = True
                    txtSem.Enabled = True
                    DateTimePicker1.Enabled = True


                    butEdit.Visible = False
                    butDelete.Visible = False
                    strconss.Close()
                End If
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub frmEmpEdit_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated

        Me.Left = 0
        Me.Top = 100
        Me.Width = 677
        Me.Height = 530
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmEmpEdit_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub frmDeparEdit_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load

        Me.Left = 0
        Me.Top = 100
        Me.Width = 677
        Me.Height = 530
        Me.MdiParent = mdiChurch

        butEdit.Visible = False
        butDelete.Visible = False
        txtCCode.Text = ""
        Me.txtCourseName.Text = ""
        Me.txtSec.Text = ""
        Me.txtSem.Text = ""
    End Sub

    Private Sub dtptEdit_CellDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellDoubleClick
        butEdit.Visible = True
        butDelete.Visible = True
    End Sub

    Private Sub butDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butDelete.Click
        Try
            Dim Choice As String
            If txtCCode.Text <> "" And CheckBox1.Checked = False And txtCCode.Enabled = False Then
                Choice = MsgBox("Are you sure you want to Delete?", vbYesNo + vbInformation, "Delete")
                If Choice = vbYes Then
                    Call conns()
                    str_sql_user_select = "Delete  from [DepartStaff] where vDepartStaffCode ='" & txtCCode.Text & "'"

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    MsgBox("Data has been Deleted", MsgBoxStyle.Information, "Delete")
                    dtptEdit.Rows.Clear()
                    txtCCode.Text = ""
                    txtCourseName.Text = ""
                    txtSec.Text = ""
                    txtSem.Text = ""
                    myAccessReader.Close()



                    Exit Sub
                End If
            End If
            If CheckBox1.Checked = True And txtCCode.Enabled = False Then
                Dim Choices As String = ""

                Choices = MsgBox("Are you sure you want to Delete?", vbYesNo + vbInformation, "Delete")
                If Choices = vbYes Then
                    Call conns()
                    str_sql_user_select = "Delete from  [DepartStaff] where id = " & ids & ""

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    MsgBox("Data has been Deleted", MsgBoxStyle.DefaultButton1, "Delete")


                    myAccessReader.Close()



                End If
            End If
            strconss.Close()
            Call requery()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butExit_Click_1(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub
End Class